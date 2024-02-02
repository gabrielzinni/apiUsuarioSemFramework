<?php
    namespace App\Models;
    use App\config\DB;

    class User
    {
        public static function select(int $id) {
            
            $db = DB::connect();
            $query = $db->prepare("SELECT * FROM user WHERE id = :id");
            $query->bindValue(':id', $id);
            $query->execute();
            
            if ($query->rowCount() > 0) {
                return $query->fetch(\PDO::FETCH_ASSOC);
            } else {
                return "Nenhum usuário encontrado!";
            }
        }

        public static function selectAll() {
            $db = DB::connect();
            $query = $db->prepare("SELECT * FROM user");
            $query->execute();
            
            if ($query->rowCount() > 0) {
                return $query->fetchAll(\PDO::FETCH_ASSOC);
            } else {
                return "Nenhum usuário encontrado!";
            }
        }

        public static function insert($data)
        {
            
            $db = DB::connect();
            $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);

            // Valida o e-mail
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $query = $db->prepare("SELECT * FROM user where email = '$email'");
                $query->execute();

                if ($query->rowCount() > 0) {
                    return "Email já cadastrado!";
                } else {

                    $query = $db->prepare("INSERT INTO user (email, password, name) VALUES (:em, MD5(:pa), :na)");
                
                    $query->bindValue(':em', $data['email']);
                    $query->bindValue(':pa', $data['password']);
                    $query->bindValue(':na', $data['name']);
                    $query->execute();

                    if ($query->rowCount() > 0) {
                        return 'Usuário(a) inserido com sucesso!';
                    } else {
                        return "Falha ao inserir usuário(a)!";
                    }
                }

            } else {
                return "$email não é um e-mail válido.!";
            }
            
            
        }

        public static function update($data)
        {
            
            $db = DB::connect();
            $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);

            if(isset($data['id'])){

                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                    $query = $db->prepare("SELECT * FROM user where email = '$email'");
                    $query->execute();
    
                    if ($query->rowCount() > 0) {
                        return "Email já cadastrado!";
                    } else {
    
                        $id = $data['id'];
                        array_shift($data);

                        $query = "UPDATE user SET ";

                        $contador = 1;
                        
                        foreach (array_keys($data) as $indice) {
                            if (count($data) > $contador) {
                                $query .= "{$indice} = '{$data[$indice]}', ";
                            } else {
                                $query .= "{$indice} = '{$data[$indice]}' ";
                            }
                            $contador++;
                        }

                        $query .= "where id = $id";

                        $query = $db->prepare($query);
                        
                        $query->execute();
    
                        if ($query->rowCount() > 0) {
                            return 'Usuário(a) alterado com sucesso!';
                        } else {
                            return "Falha ao alterar usuário(a)!";
                        }
                        
                    }
    
                } else {
                    return "$email não é um e-mail válido.!";
                }

            }else {
                return "Precisa passar o ID";
            }
            
        }

        public static function delete($data)
        {
            $id = $data['id'];

            if(isset($id)){
                $db = DB::connect();
                $query = $db->prepare("DELETE FROM user WHERE id = $id");
                
                $query->execute();

                if ($query->rowCount() > 0) {
                    return 'Usuário(a) excluído com sucesso!';
                } else {
                    return "Falha ao excluído usuário(a)!";
                }
            }else {
                return "Precisa passar o ID";
            }
            
            
        }
    }