<?php

    class Painel {

        public static function logado() {
            return isset($_SESSION['login']) ? true : false;
        }

        public static function logout() {
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
    }

?>