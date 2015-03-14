<?php

App::uses('AppModel', 'Model');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class UsersAppModel extends AppModel {

    /**
     * saveFile method
     *
     */
    public function saveFile($arquivo = array(), $nome = null, $diretorio = null) {
        if ((!$arquivo['error']) and ( $arquivo['size'])) {

            $nome = strtolower(str_replace(" ", "-", $nome));

            //removo a primeira / do titulo  
            $diretorio_local = substr($diretorio, 0, -1);

            //declaro aonde salvar os arquivos  
            $diretorio_local = WWW_ROOT . str_replace(array('/'), DS, $diretorio);
            $diretorio_local = str_replace(array(DS . DS), DS, $diretorio_local);

            //verifica se existe a pasta  
            if (!is_dir($diretorio_local)) {

                //caso não exista eu chamo o Utilitie Folder  
                $folder = new Folder();

                //crio a pasta já verificando se conseguiu  
                if ($folder->create($diretorio_local)) {
                    //se conseguiu criar o diretório eu dou permissão  
                    $folder->chmod($diretorio_local, 0755, true);
                } else {
                    //se não foi possível informo um erro  
                    throw new NotFoundException(__('Erro ao criar a pasta'));
                }
            }

            //Ok, com diretório devidamente criado, vamos declarar o arquivo temporário  
            $arquivo_tmp = new File($arquivo['tmp_name'], false);

            //pegar os dados dele  
            $dados = $arquivo_tmp->read();

            //e fecha-lo  
            $arquivo_tmp->close();

            //agora vamos criar nosso arquivo  
            $arquivo_nome = new File($diretorio_local . DS . $nome, false, 0644);

            //cria-lo  
            $arquivo_nome->create();

            //escrever os dados armazenados  
            $arquivo_nome->write($dados);

            //e feixar o arquivo  
            $arquivo_nome->close();

            //retorno só nome do arquivo para salvar no banco, mas poderia ser o diretório web também  
            return $diretorio . '/' . $nome;
        } else {
            throw new NotFoundException(__('Erro ao enviar arquivo!'));
        }
    }

}
