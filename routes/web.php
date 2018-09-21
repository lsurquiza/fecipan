<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

/*
 * Rotas Utilizadas para o Administrador fazer o controle de perfis dos 
 * usuários do sistema
 *
 */
# Visualização de Perfis Cadastrados: "perfil.perfil"
Route::get('/perfil', 'PerfilController@index');
# Inserção de Perfis no banco de dados: "perfil.formCreate"
Route::get('/perfil/create/{perfil_id}', 'PerfilController@formCreate');
Route::post('/perfil/create', 'PerfilController@create');
# Exclusão de Perfis do banco de dados
Route::get('/perfil/delete/{perfil_id}', 'PerfilController@delete');
# Visualização de Perfis vinculados ao perfil dado: "perfil.vinculos"
Route::get('/perfil/vinculos/{perfil_id}', 'PerfilController@vinculos');
# Visualização de Usuários vinculados ao perfil dado: "perfil.usuarios"
Route::get('/perfil/usuarios/{perfil_id}', 'PerfilController@usuarios');
# Visualização de Conteúdos permitidos para o perfil dado: "perfil.permissoes"
Route::get('/perfil/permissoes/{perfil_id}', 'PerfilController@permissoes');

/*
Route::get('/pessoa', 'PessoaController@index');
Route::get('/pessoa/create', 'PessoaController@formCreate');
Route::post('/pessoa/create', 'PessoaController@create');
Route::get('/pessoa/delete/{pessoa_id}', 'PessoaController@delete');
Route::get('/pessoa/usuarios/{pessoa_id}', 'PessoaController@usuarios');
Route::get('/pessoa/usuario/create/{pessoa_id}', 'PessoaController@formCreateUsuario');
Route::post('/pessoa/usuario/create', 'PessoaController@createUsuario');
*/


/*
 * Rotas Utilizadas para o Administrador fazer o controle dos usuários 
 * do sistema
 *
 */
# Visualização dos Usuários Cadastrados: "usuario.usuario"
Route::get('/usuario', 'UsuarioController@index');
# Inserção dos Usuários no banco de dados: "usuario.formCreate"
Route::get('/usuario/create/{perfil_id}', 'UsuarioController@formCreate');
Route::post('/usuario/create', 'UsuarioController@create');
# Alteração dos Usuários no banco de dados: "usuario.formUpdate"
Route::get('/usuario/update/{usuario_id}', 'UsuarioController@formUpdate');
Route::post('/usuario/update', 'UsuarioController@update');
# Exclusão dos Usuários do banco de dados
Route::get('/usuario/delete/{usuario_id}', 'UsuarioController@delete');

/*
 * Rotas Utilizadas para o Administrador fazer o controle de conteudos 
 * do sistema
 *
 */
# Visualização dos Conteúdos Cadastrados: "conteudo.conteudo"
Route::get('/conteudo', 'ConteudoController@index');
# Inserção dos Conteúdos no banco de dados: "conteudo.formCreate"
Route::get('/conteudo/create', 'ConteudoController@formCreate');
Route::post('/conteudo/create', 'ConteudoController@create');
# Alteração dos Conteúdos no banco de dados: "conteudo.formUpdate"
Route::get('/conteudo/update/{conteudo_id}', 'ConteudoController@formUpdate');
Route::post('/conteudo/update', 'ConteudoController@update');
# Exclusão dos Conteúdos no banco de dados
Route::get('/conteudo/delete/{conteudo_id}', 'ConteudoController@delete');
# Inserção dos Conteúdos com permissão ao perfil dado: "conteudo.formCreatePermissao"
Route::get('/permissao/create/{perfil_id}', 'ConteudoController@formCreatePermissao');
Route::post('/permissao/create', 'ConteudoController@createPermissao');
# Associação entre conteudos e perfis previamente cadastrados: "conteudo.formAssociarPerfil"
Route::get('/conteudo/associar/{conteudo_id}', 'ConteudoController@formAssociarPerfil');
Route::post('/conteudo/associar', 'ConteudoController@associarPerfil');
# Visualização de permissoes para um determinado conteúdo: "conteudo.permissoes"
Route::get('/conteudo/permissoes/{conteudo_id}', 'ConteudoController@permissoes');

/*
 * O usuário com perfil ORGANIZADOR do evento consegue vizualizar 
 * os atores do sistema
 *   Avaliadores - Avaliam os trabalhos do evento
 *   Estudantes - Pesquisadores orientandos dos trabalhos do evento
 *   Orientadores - Orientadores e coorientadores dos trabalhos do evento
 *
 */
Route::get('/pessoa/avaliadores', 'AvaliadorController@index');
Route::get('/pessoa/estudantes', 'EstudanteController@index');
Route::get('/pessoa/orientadores', 'OrientadorController@index');
# Visualização de Trabalhos avaliados por um Avaliador: "avaliador.avaliacoes"
Route::get('/avaliador/avaliacoes/{avaliador_id}', 'AvaliadorController@avaliacoes');
# Inserção de um Avaliador: "avaliador.avaliacoes"
Route::get('/avaliador/create', 'AvaliadorController@formCreate');
Route::post('/avaliador/create', 'AvaliadorController@create');
# Exclusão de um Avaliador
Route::get('/avaliador/delete/{avaliador_id}', 'AvaliadorController@delete');
# Visualização de Trabalhos de um Estudante: "estudante.trabalhos"
Route::get('/estudante/trabalhos/{estudante_id}', 'EstudanteController@trabalhos');
# Inserção de um Estudante: "estudante.formCreate"
Route::get('/estudante/create', 'EstudanteController@formCreate');
Route::post('/estudante/create', 'EstudanteController@create');
# Exclusão de um Estudante
Route::get('/estudante/delete/{estudante_id}', 'EstudanteController@delete');
# Visualização de Trabalhos de um Orientador: "orientador.trabalhos"
Route::get('/orientador/trabalhos/{orientador_id}', 'OrientadorController@trabalhos');
# Inserção de um Orientador: "orientador.formCreate"
Route::get('/orientador/create', 'OrientadorController@formCreate');
Route::post('/orientador/create', 'OrientadorController@create');
# Exclusão de um Orientador
Route::get('/orientador/delete/{orientador_id}', 'OrientadorController@delete');



/*
 * Rotas Utilizadas para o Organizador fazer o lançamento de notas 
 * dos trabalhos
 *
 */
# Lançamento de Notas de um Avaliador em um Trabalho
Route::get('/avaliacao/notas/{avaliacao_id}', 'AvaliacaoController@formNotas');
Route::post('/avaliacao/notas', 'AvaliacaoController@updateNotas');

/*
 * Rotas Utilizadas para o Organizador fazer o controle de eventos 
 * do sistema
 *
 */
# Visualização de Evento: "evento.evento"
Route::get('/evento', 'EventoController@index');
# Inserção de Evento no Banco de Dados: "evento.formCreate"
Route::get('/evento/create', 'EventoController@formCreate');
Route::post('/evento/create', 'EventoController@create');
# Alteração dos Dados do Evento no Banco de Dados: "evento.formUpdate"
Route::get('/evento/update/{evento_id}', 'EventoController@formUpdate');
Route::post('/evento/update', 'EventoController@update');
# Exclusão dos Dados de um Evento
Route::get('/evento/delete/{evento_id}', 'EventoController@delete');
# Visualização dos Trabalhos de um determinado Evento: "trabalho.trabalho"
Route::get('/evento/trabalhos/{evento_id}', 'TrabalhoController@index');
# Visualização dos Quesitos de um determinado Evento: "quesito.quesito"
Route::get('/evento/quesitos/{evento_id}', 'QuesitoController@index');
# Inserção de Quesitos no Banco de Dados: "quesito.formCreate"
Route::get('/quesito/create/{evento_id}', 'QuesitoController@formCreate');
Route::post('/quesito/create', 'QuesitoController@create');
# Exclusão de Quesito do Bando de Dados
Route::get('/quesito/delete/{quesito_id}', 'QuesitoController@delete');

/*
 * Rotas Utilizadas para o Organizador fazer o controle das áreas
 * de conhecimento do sistema
 *
 */
# Visualização das Áreas de Conhecimento: "area.area"
Route::get('/area', 'AreaController@index');
# Inserção das Áreas no Banco de Dados: "area.formCreate"
Route::get('/area/create', 'AreaController@formCreate');
Route::post('/area/create', 'AreaController@create');
# Alteração das Áreas no Banco de Dados: "area.formUpdate"
Route::get('/area/update/{area_id}', 'AreaController@formUpdate');
Route::post('/area/update', 'AreaController@update');
# Exclusão de Área de Conhecimento
Route::get('/area/delete/{area_id}', 'AreaController@delete');

/*
 * Rotas Utilizadas para o Organizador fazer o controle das categorias
 * dos trabalhoos do sistema
 *
 */
# Visualização das Categorias: "categoria.categoria"
Route::get('/categoria', 'CategoriaController@index');
# Inserção das Categorias no Banco de Dados: "categoria.formCreate"
Route::get('/categoria/create', 'CategoriaController@formCreate');
Route::post('/categoria/create', 'CategoriaController@create');
# Alteração das Categorias no Banco de Dados: "categoria.formUpdate"
Route::get('/categoria/update/{categoria_id}', 'CategoriaController@formUpdate');
Route::post('/categoria/update', 'CategoriaController@update');
# Exclusão de Categoria de Trabalho
Route::get('/categoria/delete/{categoria_id}', 'CategoriaController@delete');

/*
 * Rotas Utilizadas para o Organizador fazer o controle dos tipos
 * de trabalho do sistema
 *
 */
# Visualização dos Tipos de Trabalho: "tipotrabalho.tipotrabalho"
Route::get('/tipoTrabalho', 'TipoTrabalhoController@index');
# Inserção dos Tipos no Banco de Dados: "tipotrabalho.formCreate"
Route::get('/tipoTrabalho/create', 'tipoTrabalhoController@formCreate');
Route::post('/tipoTrabalho/create', 'tipoTrabalhoController@create');
# Alteração dos Tipos no Banco de Dados: "tipotrabalho.formUpdate"
Route::get('/tipoTrabalho/update/{tipoTrabalho_id}', 'tipoTrabalhoController@formUpdate');
Route::post('/tipoTrabalho/update', 'tipoTrabalhoController@update');
# Exclusão dos Tipos de Trabalho
Route::get('/tipoTrabalho/delete/{tipoTrabalho_id}', 'tipoTrabalhoController@delete');

/*
 * Rotas Utilizadas para o Organizador fazer o controle dos trabalhos
 * do sistema
 *
 */
# Inserção de Trabalhos em um Evento: "trabalho.formCreate"
Route::get('/trabalho/create/{evento_id}', 'TrabalhoController@formCreate');
Route::post('/trabalho/create', 'TrabalhoController@create');
# Alteração de Trabalhos em um Evento: "trabalho.formUpdate"
Route::get('/trabalho/update/{trabalho_id}', 'TrabalhoController@formUpdate');
Route::post('/trabalho/update/', 'TrabalhoController@update');
# Exclusão de Trabalhos
Route::get('/trabalho/delete/{trabalho_id}', 'TrabalhoController@delete');
# Visualização de Avaliadores de um Trabalho: "avaliacao.avaliacao"
Route::get('/trabalho/avaliacoes/{trabalho_id}', 'AvaliacaoController@index');
# Visualização de Estudantes de um Trabalho: "estudante.estudante"
Route::get('/trabalho/estudantes/{trabalho_id}', 'ParticipacaoController@index');
# Visualização de Orientador e Coorientadores de um Trabalho: "orientador.orientador"
Route::get('/trabalho/orientadores/{trabalho_id}', 'OrientacaoController@index');
# Adiciona Avaliadores em um Trabalho: "avaliacao.formCreate"
Route::get('/avaliacao/create/{trabalho_id}', 'AvaliacaoController@formCreate');
Route::post('/avaliacao/create', 'AvaliacaoController@create');
# Retira um Avaliador de um Trabalho
Route::get('/avaliacao/delete/{avaliacao_id}', 'AvaliacaoController@delete');
# Adiciona Estudantes em um Trabalho: "estudante.formCreate"
Route::get('/participacao/create/{trabalho_id}', 'ParticipacaoController@formCreate');
Route::get('/participacao/delete/{trabalho_id}/{estudante_id}', 'ParticipacaoController@delete');
# Retira um Estudante de um Trabalho
Route::post('/participacao/create', 'ParticipacaoController@create');Route::get('/participacao/create/{trabalho_id}', 'ParticipacaoController@formCreate');
# Adiciona Orientador e Coorientadores em um Trabalho: "orientador.formCreate"
Route::get('/orientacao/create/{trabalho_id}', 'OrientacaoController@formCreate');
Route::get('/orientacao/delete/{trabalho_id}/{orientador_id}', 'OrientacaoController@delete');
# Retira um Orientador de um Trabalho
Route::post('/orientacao/create', 'OrientacaoController@create');

# Exibe o Ranking de um determinado Evento
Route::get('/ranking/{evento_id}', 'EventoController@ranking');