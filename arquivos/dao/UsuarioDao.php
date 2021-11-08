<?php
class UsuarioDAO{
    
    public function create(Usuario $usuario) {
        try {
            $sql = "INSERT INTO usuario (                   
                  nome,sobrenome,idade,sexo)
                  VALUES (
                  :nome,:sobrenome,:idade,:sexo)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $usuario->getNome());
            $p_sql->bindValue(":sobrenome", $usuario->getSobrenome());
            $p_sql->bindValue(":idade", $usuario->getIdade());
            $p_sql->bindValue(":sexo", $usuario->getSexo());
            
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir usuario <br>" . $e . '<br>';
        }
    }

    public function read(){
        try{
            $sql = "select * from usuario order by nome";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            //P = PHP / D = DATA / O = OBJECT
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaUsuarios($l);
            }
            return $f_lista;
        }catch(Exception $e){
            print "Ocorreu um erro ao tentar buscar ".$e;
        }
    }


    public function listaUsuarios($linha){
        $usuario = new Usuario();
        $usuario->setId($linha['id']);
        $usuario->setNome($linha['nome']);
        $usuario->setSobrenome($linha['sobrenome']);
        $usuario->setIdade($linha['idade']);
        $usuario->setSexo($linha['sexo']);

        return $usuario;        
    }




    public function update(Usuario $usuario){
        try{
            $sql = "update usuario set 
                nome=:nome,
                sobrenome=:sobrenome,
                idade=:idade,
                sexo=:sexo where id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $usuario->getNome());
            $p_sql->bindValue(":sobrenome", $usuario->getSobrenome());
            $p_sql->bindValue(":idade", $usuario->getIdade());
            $p_sql->bindValue(":sexo", $usuario->getSexo());
            $p_sql->bindValue(":id", $usuario->getId());
            
            return $p_sql->execute();           


        }catch(Exception $e){
            print "Ocorreu um erro ao tentar atualizar ".$e;
        }
    }
    
    public function delete(Usuario $usuario) {
        try {
            $sql = "DELETE FROM usuario WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $usuario->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir usuario<br> $e <br>";
        }
    }

}

?>