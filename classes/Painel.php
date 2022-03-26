<?php

    class Painel {

        public static $cargos = [
            '0'=>'Normal',
            '1'=>'Sub  Adminnistrador',
            '2'=>'Administrador'
        ];

        public static function logado() {
            return isset($_SESSION['login']) ? true : false;
        }

        public static function logout() {
            setcookie('lembrar',true,time()-1,'/');
            setcookie('user',$user,time()-1,'/');
            setcookie('password',$password,time()-1,'/');
            session_destroy();
            header('Location: '.INCLUDE_PATH_PAINEL);
        }

        public static function carregarPagina() {
            if(isset($_GET['url'])) {
                $url = explode('/',$_GET['url']);
                if(file_exists('pages/'.$url[0].'.php')) {
                    include_once('pages/'.$url[0].'.php');
                } else {
                    // Página não existe
                    header('Location: '.INCLUDE_PATH_PAINEL);
                }
            } else {
                include_once('pages/home.php');
            }
        }

        public static function listarUsuariosOnline() {
            self::limparUsuariosOnline();
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin_online`");
            $sql->execute();
            return $sql->fetchAll();
        }

        public static function limparUsuariosOnline() {
            $date = date('Y-m-d H:i:s');
            $sql = MySql::conectar()->exec("DELETE FROM `tb_admin_online` WHERE ultima_acao < '$date' - INTERVAL 1 MINUTE");
        }

        public static function alert($tipo,$mensagem) {
            if($tipo == 'sucesso') {
                echo '<div class="box-alert sucesso"><i class="fas fa-check"></i> '.$mensagem.'</div>';
            } else if ($tipo == 'erro') {
                echo '<div class="box-alert erro"><i class="fas fa-times"></i> '.$mensagem.'</div>';
            }
        }

        public static function imagemValida($imagem) {
            if($imagem['type'] == 'image/jpeg' || $imagem['type'] == 'image/jpg' || $imagem['type'] == 'image/png') {
                $tamanho = intval($imagem['size'] / 1024);
                if($tamanho < 10000) {
                    return true;
                } else {
                    return false;
                }
                return true;
            } else {
                return false;
            }
        }

        public static function uploadFile($file) {
            $formatoArquivo = explode('.',$file['name']);
            $imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
            if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$imagemNome)) {
                return $imagemNome;
            } else {
                return false;
            }
        }

        public static function deleteFile($file) {
            @unlink('uploads/'.$file);
        }

        public static function insert($arr) {
            $certo = true;
            $nome_tabela = $arr['nome_tabela'];
            $query = "INSERT INTO `$nome_tabela` VALUES(null";
            foreach ($arr as $key => $value) {
                $nome = $key;
                $valor = $value;
                if($nome == 'acao' || $nome == 'nome_tabela') {
                    continue;
                }
                if($value == '') {
                    $certo = false;
                    break;
                }
                $query.=",?";
                $parametros[] = $value;
            }

            $query.=")";
            if($certo == true) {
                $sql = MySql::conectar()->prepare($query);
                $sql->execute($parametros);
            }

            return $certo;
        }

        public static function update($arr) {
            $certo = true;
            $first = false;
            $nome_tabela = $arr['nome_tabela'];
            $query = "UPDATE `$nome_tabela` SET ";
            foreach($arr as $key => $value) {
                $nome = $key;
                $valor = $value;
                if($nome == 'acao' || $nome == 'nome_tabela' || $nome == 'id') {
                    continue;
                }

                if($value == '') {
                    $certo = false;
                    break;
                }
        
                if($first == false) {
                    $first = true;
                    $query.="$nome=?";
                } else {
                    $query.=",$nome=?";
                }
                $parametros[] = $value;
            }
            if($certo == true) {
                $parametros[] = $arr['id'];
                $sql = MySql::conectar()->prepare($query.' WHERE id=?');
                $sql->execute($parametros);
            }
            return $certo;

        }

        public static function selectAll($tabela,$start = null,$end = null) {
            if($start == null && $end == null) {
                $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela`");
            } else {
                $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` LIMIT $start,$end");
            }
            
            $sql->execute();
            return $sql->fetchAll();
        }

        public static function deletar($tabela,$id=false) {
            if($id == false) {
                $sql = MySql::conectar()->prepare("DELETE FROM `$tabela`");
            } else {
                $sql = MySql::conectar()->prepare("DELETE FROM `$tabela` WHERE id = $id");
            }
            $sql->execute();
        }

        public static function redirect($url) {
            echo '<script>location.href="'.$url.'"</script>';
            die();
        }

        // Metódo específico para selecionar apenas um registro
        public static function select($table,$query,$arr) {
            $sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE $query");
            $sql->execute($arr);
            return $sql->fetch();
        }
    }

?>