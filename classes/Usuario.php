<?php

    class Usuario {

        public function atualizarUsuario($nome,$senha,$imagem) {
            $sql = MySql::conectar()->prepare("UPDATE `tb_admin_usuarios` SET nome = ?, password = ?, imagem = ? WHERE user = ?");
            if($sql->execute(array($nome,$senha,$imagem,$_SESSION['user']))) {
                return true;
            } else {
                return false;
            }
        }

        public static function userExists($user) {
            $sql = MySql::conectar()->prepare("SELECT `id` FROM `tb_admin_usuarios` WHERE user = ?");
            $sql->execute(array($user));
            if($sql->rowCount() == 1) {
                return true;
            } else {
                return false;
            }
        }

        public static function cadastrarUsuario($user,$password,$imagem,$nome,$cargo) {
            $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin_usuarios` VALUES(null,?,?,?,?,?)");
            $sql->execute(array($user,$password,$imagem,$nome,$cargo));
        }
    }

?>