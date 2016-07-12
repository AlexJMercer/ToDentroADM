create table editor_menu(
  id_edme serial not null,
  menu_nome text,
  caminho text,
  Primary Key(id_edme)
);
INSERT INTO editor_menu (menu_nome, caminho) VALUES (NULL, NULL);
INSERT INTO editor_menu (menu_nome, caminho) VALUES ('Notícias', '/editor/noticias.html');
INSERT INTO editor_menu (menu_nome, caminho) VALUES ('Cardápios', '/editor/cardapios.html');
INSERT INTO editor_menu (menu_nome, caminho) VALUES ('Cursos', '/editor/cursos.html');
INSERT INTO editor_menu (menu_nome, caminho) VALUES ('Monitorias', '/editor/monitorias.html');
INSERT INTO editor_menu (menu_nome, caminho) VALUES ('Estágios', '/editor/estagios.html');
INSERT INTO editor_menu (menu_nome, caminho) VALUES ('Eventos', '/editor/eventos.html');
INSERT INTO editor_menu (menu_nome, caminho) VALUES ('Categorias', '/editor/categorias.html');
INSERT INTO editor_menu (menu_nome, caminho) VALUES ('Locais', '/editor/locais.html');
INSERT INTO editor_menu (menu_nome, caminho) VALUES ('Assistência Estudantil', '/editor/assistencias.html');
INSERT INTO editor_menu (menu_nome, caminho) VALUES ('Setores', '/editor/setores.html');

create table permissions(
  id_perm serial not null,
  user_id integer not null,
  noticias varchar(20) DEFAULT(null),
  cardapios varchar(20) DEFAULT(null),
  cursos varchar(20) DEFAULT(null),
  monitorias varchar(20) DEFAULT(null),
  estagios varchar(20) DEFAULT(null),
  eventos varchar(20) DEFAULT(null),
  categorias varchar(20) DEFAULT(null),
  locais varchar(20) DEFAULT(null),
  assistencias varchar(20) DEFAULT(null),
  setores varchar(20) DEFAULT(null),
  primary key(id_perm)
);
