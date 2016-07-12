create table dia(
	id_dia serial not null,
	dia varchar(100) not null,
	primary key(id_dia)
);

INSERT INTO dia (dia) VALUES ('Segunda-Feira');
INSERT INTO dia (dia) VALUES ('Terça-Feira');
INSERT INTO dia (dia) VALUES ('Quarta-Feira');
INSERT INTO dia (dia) VALUES ('Quinta-Feira');
INSERT INTO dia (dia) VALUES ('Sexta-Feira');

create table categorias(
	id_cat serial not null,
	categoria varchar(150) not null,
	primary key(id_cat)

);

create table local(
	id_lo serial not null,
	sala varchar(150) not null,
	Primary key(id_lo)
);

create table status(
	id_sta serial not null,
	status text not null,
	primary key(id_sta)

);

INSERT INTO status (status) VALUES ('Sob Avaliação!');
INSERT INTO status (status) VALUES ('Rejeitado!');
INSERT INTO status (status) VALUES ('Editado!');
INSERT INTO status (status) VALUES ('Publicado!');
INSERT INTO status (status) VALUES ('Publicado e editado!');

create table assistencias(

	id_assist serial not null,
	assist varchar(150) not null,
	texto text not null,
	primary key(id_assist)
);

create table semestre(
	id_sem serial not null,
	semestre text not null,
	Primary key(id_sem)

);

INSERT INTO semestre (semestre) VALUES ('1º Semestre');
INSERT INTO semestre (semestre) VALUES ('2º Semestre');
INSERT INTO semestre (semestre) VALUES ('3º Semestre');
INSERT INTO semestre (semestre) VALUES ('4º Semestre');
INSERT INTO semestre (semestre) VALUES ('5º Semestre');
INSERT INTO semestre (semestre) VALUES ('6º Semestre');
INSERT INTO semestre (semestre) VALUES ('7º Semestre');
INSERT INTO semestre (semestre) VALUES ('8º Semestre');
INSERT INTO semestre (semestre) VALUES ('9º Semestre');
INSERT INTO semestre (semestre) VALUES ('10º Semestre');
INSERT INTO semestre (semestre) VALUES ('11º Semestre');
INSERT INTO semestre (semestre) VALUES ('12º Semestre');

create table eventos(
	id_event serial not null,
	evento varchar(300) not null,
	event_cat integer not null,
	data_inicio date not null,
	data_fim date default(null),
	horario varchar(100) not null,
	texto text not null,
	imagem text,
	primary key(id_event),
	foreign key(event_cat) references categorias
	ON UPDATE CASCADE ON DELETE CASCADE

);

create table estagios(
	id_est serial not null,
	titulo varchar(200) not null,
	salario numeric(10,2) not null,
	condicoes text not null,
	atividades text not null,
	exigencias text not null,
	info_est text,
	primary key(id_est)
);

create table cardapios(
	id_card serial not null,
	dia integer not null unique,
	data date not null,
	primary key(id_card),
	foreign key(dia) references dia

	ON UPDATE CASCADE ON DELETE CASCADE
);

create table alimentos(
	id_ali serial not null,
	alimento varchar(150) not null,
	primary key(id_ali)

);

create table alimentos_cardapios(
	card_id integer not null,
	ali_id integer not null,
	foreign key(card_id) references cardapios

	ON UPDATE CASCADE ON DELETE CASCADE,

	foreign key(ali_id) references alimentos

	ON UPDATE CASCADE ON DELETE CASCADE
);

create table usertype(
	id_type serial not null,
	type varchar(50) not null,
	primary key(id_type)
);

INSERT INTO usertype (type) VALUES('Autor');
INSERT INTO usertype (type) VALUES('Editor');
INSERT INTO usertype (type) VALUES('Administrador');
INSERT INTO usertype (type) VALUES('Revisor');

create table usuarios(
	id_user serial not null,
	nome varchar(200) not null,
	email varchar(200) not null unique,
	senha varchar(500) not null,
	type_id integer default(1) not null,
	primary key(id_user),
	foreign key(type_id) references usertype

	ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO usuarios (nome, email, senha, type_id) VALUES ('Administrador','admin@admin.com','admin', '3');

create table permissaoteste(
	id_perm serial not null,
	user_id integer not null,
	noticias text DEFAULT(NULL),
	cardapios text DEFAULT(NULL),
	cursos text DEFAULT(NULL),
	primary key(id_perm),
	foreign key(user_id) references usuarios

	ON UPDATE CASCADE ON DELETE CASCADE
);


create table permissions(
  id_perm serial not null,
  user_id integer not null,
  noticias boolean not null default false,
  cardapios boolean not null default false,
  cursos boolean not null default false,
  monitorias boolean not null default false,
  eventos boolean not null default false,
  setores boolean not null default false,
  assistencia boolean not null default false,
  categorias boolean not null default false,
  locais boolean not null default false,
  estagios boolean not null default false,
  primary key(id_perm),
  foreign key(user_id) references usuarios

  ON UPDATE CASCADE ON DELETE CASCADE
);

create table noticias(
	id_not serial not null,
	titulo varchar(200) not null,
	linha_apoio varchar(350),
	texto text not null,
	data date default(now()) not null,
	hora time default(now()) not null,
	autor integer not null,
	status integer not null,
	url text,
	primary key(id_not),
	foreign key(autor) references usuarios
	ON UPDATE CASCADE ON DELETE CASCADE,
	foreign key(status) references status

	ON UPDATE CASCADE ON DELETE CASCADE
);

create table categorias_noticias(
	cat_id integer not null,
	not_id integer not null,
	foreign key(cat_id) references categorias
	ON UPDATE CASCADE ON DELETE CASCADE,

	foreign key(not_id) references noticias

	ON UPDATE CASCADE ON DELETE CASCADE
);


create table imagens_noticias(
	id_im serial not null,
	imagem text not null,
	noticia integer not null,
	primary key(id_im),
	foreign key(noticia) references noticias

	ON UPDATE CASCADE ON DELETE CASCADE
);

create table programacao(
	id_prog serial not null,
	evento_id integer not null,
	primary key(id_prog),
	foreign key(evento_id) references eventos

	ON UPDATE CASCADE ON DELETE CASCADE
);

create table instituto(
	id_inst serial not null,
	instituto text not null,
	primary key(id_inst)
);

INSERT INTO instituto (instituto) VALUES ('IFSul - Campus Pelotas');

create table cursos(
	id_curso serial not null,
	nome text not null,
	inst_id integer default(1),
	texto text,
	logo text,
	primary key(id_curso),
	foreign key(inst_id) references instituto
);

create table disciplinas(
	id_disc serial not null,
	disciplina text not null,
	curso integer not null,
	primary key(id_disc),
	foreign key(curso) references cursos

	ON UPDATE CASCADE ON DELETE CASCADE
);

create table estagio_cursos(
	est_id integer not null,
	curso_id integer not null,
	foreign key(est_id) references estagios

	ON UPDATE CASCADE ON DELETE CASCADE,

	foreign key(curso_id) references cursos

	ON UPDATE CASCADE ON DELETE CASCADE
);

create table monitorias(
	id_monit serial not null,
	curso_m integer not null,
	semestre_m integer not null,
	sala_m integer not null,
	disciplina_m integer not null,
	info_m text not null,
	primary key(id_monit),
	foreign key(curso_m) references cursos
	ON UPDATE CASCADE ON DELETE CASCADE,
	foreign key(semestre_m) references semestre
	ON UPDATE CASCADE ON DELETE CASCADE,
	foreign key(sala_m) references local
	ON UPDATE CASCADE ON DELETE CASCADE,
	foreign key(disciplina_m) references disciplinas
	ON UPDATE CASCADE ON DELETE CASCADE

);

create table setores(
	id_set serial not null,
	setor varchar(75) not null,
	texto text not null,
	primary key(id_set)
);
