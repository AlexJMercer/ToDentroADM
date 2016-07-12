--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: alimentos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE alimentos (
    id_ali integer NOT NULL,
    alimento character varying(150) NOT NULL
);


ALTER TABLE public.alimentos OWNER TO postgres;

--
-- Name: alimentos_cardapios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE alimentos_cardapios (
    card_id integer NOT NULL,
    ali_id integer NOT NULL
);


ALTER TABLE public.alimentos_cardapios OWNER TO postgres;

--
-- Name: alimentos_id_ali_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE alimentos_id_ali_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.alimentos_id_ali_seq OWNER TO postgres;

--
-- Name: alimentos_id_ali_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE alimentos_id_ali_seq OWNED BY alimentos.id_ali;


--
-- Name: assistencias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE assistencias (
    id_assist integer NOT NULL,
    assist character varying(150) NOT NULL,
    texto text NOT NULL
);


ALTER TABLE public.assistencias OWNER TO postgres;

--
-- Name: assistencias_id_assist_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE assistencias_id_assist_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.assistencias_id_assist_seq OWNER TO postgres;

--
-- Name: assistencias_id_assist_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE assistencias_id_assist_seq OWNED BY assistencias.id_assist;


--
-- Name: cardapios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cardapios (
    id_card integer NOT NULL,
    dia integer NOT NULL,
    data date NOT NULL
);


ALTER TABLE public.cardapios OWNER TO postgres;

--
-- Name: cardapios_id_card_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cardapios_id_card_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cardapios_id_card_seq OWNER TO postgres;

--
-- Name: cardapios_id_card_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cardapios_id_card_seq OWNED BY cardapios.id_card;


--
-- Name: categorias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE categorias (
    id_cat integer NOT NULL,
    categoria character varying(150) NOT NULL
);


ALTER TABLE public.categorias OWNER TO postgres;

--
-- Name: categorias_id_cat_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE categorias_id_cat_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categorias_id_cat_seq OWNER TO postgres;

--
-- Name: categorias_id_cat_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE categorias_id_cat_seq OWNED BY categorias.id_cat;


--
-- Name: categorias_noticias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE categorias_noticias (
    cat_id integer NOT NULL,
    not_id integer NOT NULL
);


ALTER TABLE public.categorias_noticias OWNER TO postgres;

--
-- Name: cursos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cursos (
    id_curso integer NOT NULL,
    nome text NOT NULL,
    inst_id integer DEFAULT 1 NOT NULL,
    texto text,
    logo text
);


ALTER TABLE public.cursos OWNER TO postgres;

--
-- Name: cursos_id_curso_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cursos_id_curso_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cursos_id_curso_seq OWNER TO postgres;

--
-- Name: cursos_id_curso_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cursos_id_curso_seq OWNED BY cursos.id_curso;


--
-- Name: dia; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE dia (
    id_dia integer NOT NULL,
    dia character varying(100) NOT NULL
);


ALTER TABLE public.dia OWNER TO postgres;

--
-- Name: dia_id_dia_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE dia_id_dia_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.dia_id_dia_seq OWNER TO postgres;

--
-- Name: dia_id_dia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE dia_id_dia_seq OWNED BY dia.id_dia;


--
-- Name: disciplinas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE disciplinas (
    id_disc integer NOT NULL,
    disciplina text NOT NULL,
    curso integer NOT NULL
);


ALTER TABLE public.disciplinas OWNER TO postgres;

--
-- Name: disciplinas_id_disc_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE disciplinas_id_disc_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.disciplinas_id_disc_seq OWNER TO postgres;

--
-- Name: disciplinas_id_disc_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE disciplinas_id_disc_seq OWNED BY disciplinas.id_disc;


--
-- Name: estagio_cursos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE estagio_cursos (
    est_id integer NOT NULL,
    curso_id integer NOT NULL
);


ALTER TABLE public.estagio_cursos OWNER TO postgres;

--
-- Name: estagios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE estagios (
    id_est integer NOT NULL,
    titulo character varying(200) NOT NULL,
    salario numeric(10,2) NOT NULL,
    condicoes text NOT NULL,
    atividades text NOT NULL,
    exigencias text NOT NULL,
    info_est text
);


ALTER TABLE public.estagios OWNER TO postgres;

--
-- Name: estagios_id_est_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE estagios_id_est_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estagios_id_est_seq OWNER TO postgres;

--
-- Name: estagios_id_est_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE estagios_id_est_seq OWNED BY estagios.id_est;


--
-- Name: eventos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE eventos (
    id_event integer NOT NULL,
    evento character varying(300) NOT NULL,
    event_cat integer NOT NULL,
    data_inicio date NOT NULL,
    data_fim date,
    horario character varying(100) NOT NULL,
    texto text NOT NULL,
    imagem text
);


ALTER TABLE public.eventos OWNER TO postgres;

--
-- Name: eventos_id_event_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE eventos_id_event_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.eventos_id_event_seq OWNER TO postgres;

--
-- Name: eventos_id_event_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE eventos_id_event_seq OWNED BY eventos.id_event;


--
-- Name: imagens_noticias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE imagens_noticias (
    id_im integer NOT NULL,
    imagem text NOT NULL,
    noticia integer NOT NULL
);


ALTER TABLE public.imagens_noticias OWNER TO postgres;

--
-- Name: imagens_noticias_id_im_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE imagens_noticias_id_im_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.imagens_noticias_id_im_seq OWNER TO postgres;

--
-- Name: imagens_noticias_id_im_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE imagens_noticias_id_im_seq OWNED BY imagens_noticias.id_im;


--
-- Name: instituto; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE instituto (
    id_inst integer NOT NULL,
    instituto text NOT NULL
);


ALTER TABLE public.instituto OWNER TO postgres;

--
-- Name: instituto_id_inst_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE instituto_id_inst_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.instituto_id_inst_seq OWNER TO postgres;

--
-- Name: instituto_id_inst_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE instituto_id_inst_seq OWNED BY instituto.id_inst;


--
-- Name: local; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE local (
    id_lo integer NOT NULL,
    sala character varying(150) NOT NULL
);


ALTER TABLE public.local OWNER TO postgres;

--
-- Name: local_id_lo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE local_id_lo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.local_id_lo_seq OWNER TO postgres;

--
-- Name: local_id_lo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE local_id_lo_seq OWNED BY local.id_lo;


--
-- Name: monitorias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE monitorias (
    id_monit integer NOT NULL,
    curso_m integer NOT NULL,
    semestre_m integer NOT NULL,
    sala_m integer NOT NULL,
    disciplina_m integer NOT NULL,
    info_m text NOT NULL
);


ALTER TABLE public.monitorias OWNER TO postgres;

--
-- Name: monitorias_id_monit_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE monitorias_id_monit_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.monitorias_id_monit_seq OWNER TO postgres;

--
-- Name: monitorias_id_monit_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE monitorias_id_monit_seq OWNED BY monitorias.id_monit;


--
-- Name: noticias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE noticias (
    id_not integer NOT NULL,
    titulo character varying(200) NOT NULL,
    linha_apoio character varying(350),
    texto text NOT NULL,
    data date NOT NULL,
    hora time without time zone NOT NULL,
    autor integer NOT NULL,
    status integer NOT NULL,
    url text
);


ALTER TABLE public.noticias OWNER TO postgres;

--
-- Name: noticias_id_not_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE noticias_id_not_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.noticias_id_not_seq OWNER TO postgres;

--
-- Name: noticias_id_not_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE noticias_id_not_seq OWNED BY noticias.id_not;


--
-- Name: permissaoteste; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE permissaoteste (
    id_perm integer NOT NULL,
    user_id integer NOT NULL,
    noticias text,
    cardapios text,
    cursos text
);


ALTER TABLE public.permissaoteste OWNER TO postgres;

--
-- Name: permissaoteste_id_perm_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE permissaoteste_id_perm_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.permissaoteste_id_perm_seq OWNER TO postgres;

--
-- Name: permissaoteste_id_perm_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE permissaoteste_id_perm_seq OWNED BY permissaoteste.id_perm;


--
-- Name: permissions; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE permissions (
    id_perm integer NOT NULL,
    user_id integer NOT NULL,
    noticias character varying(20) DEFAULT NULL::character varying,
    cardapios character varying(20) DEFAULT NULL::character varying,
    cursos character varying(20) DEFAULT NULL::character varying,
    monitorias character varying(20) DEFAULT NULL::character varying,
    estagios character varying(20) DEFAULT NULL::character varying,
    eventos character varying(20) DEFAULT NULL::character varying,
    categorias character varying(20) DEFAULT NULL::character varying,
    locais character varying(20) DEFAULT NULL::character varying,
    assistencias character varying(20) DEFAULT NULL::character varying,
    setores character varying(20) DEFAULT NULL::character varying
);


ALTER TABLE public.permissions OWNER TO postgres;

--
-- Name: permissions_id_perm_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE permissions_id_perm_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.permissions_id_perm_seq OWNER TO postgres;

--
-- Name: permissions_id_perm_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE permissions_id_perm_seq OWNED BY permissions.id_perm;


--
-- Name: programacao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE programacao (
    id_prog integer NOT NULL,
    evento_id integer NOT NULL
);


ALTER TABLE public.programacao OWNER TO postgres;

--
-- Name: programacao_id_prog_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE programacao_id_prog_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.programacao_id_prog_seq OWNER TO postgres;

--
-- Name: programacao_id_prog_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE programacao_id_prog_seq OWNED BY programacao.id_prog;


--
-- Name: semestre; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE semestre (
    id_sem integer NOT NULL,
    semestre text NOT NULL
);


ALTER TABLE public.semestre OWNER TO postgres;

--
-- Name: semestre_id_sem_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE semestre_id_sem_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.semestre_id_sem_seq OWNER TO postgres;

--
-- Name: semestre_id_sem_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE semestre_id_sem_seq OWNED BY semestre.id_sem;


--
-- Name: setores; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE setores (
    id_set integer NOT NULL,
    setor character varying(75) NOT NULL,
    texto text NOT NULL
);


ALTER TABLE public.setores OWNER TO postgres;

--
-- Name: setores_id_set_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE setores_id_set_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.setores_id_set_seq OWNER TO postgres;

--
-- Name: setores_id_set_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE setores_id_set_seq OWNED BY setores.id_set;


--
-- Name: status; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE status (
    id_sta integer NOT NULL,
    status text NOT NULL
);


ALTER TABLE public.status OWNER TO postgres;

--
-- Name: status_id_sta_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE status_id_sta_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.status_id_sta_seq OWNER TO postgres;

--
-- Name: status_id_sta_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE status_id_sta_seq OWNED BY status.id_sta;


--
-- Name: usertype; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE usertype (
    id_type integer NOT NULL,
    type character varying(50) NOT NULL
);


ALTER TABLE public.usertype OWNER TO postgres;

--
-- Name: usertype_id_type_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE usertype_id_type_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usertype_id_type_seq OWNER TO postgres;

--
-- Name: usertype_id_type_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE usertype_id_type_seq OWNED BY usertype.id_type;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE usuarios (
    id_user integer NOT NULL,
    nome character varying(200) NOT NULL,
    email character varying(200) NOT NULL,
    senha character varying(500) NOT NULL,
    type_id integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.usuarios OWNER TO postgres;

--
-- Name: usuarios_id_user_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE usuarios_id_user_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuarios_id_user_seq OWNER TO postgres;

--
-- Name: usuarios_id_user_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE usuarios_id_user_seq OWNED BY usuarios.id_user;


--
-- Name: id_ali; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY alimentos ALTER COLUMN id_ali SET DEFAULT nextval('alimentos_id_ali_seq'::regclass);


--
-- Name: id_assist; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY assistencias ALTER COLUMN id_assist SET DEFAULT nextval('assistencias_id_assist_seq'::regclass);


--
-- Name: id_card; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cardapios ALTER COLUMN id_card SET DEFAULT nextval('cardapios_id_card_seq'::regclass);


--
-- Name: id_cat; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY categorias ALTER COLUMN id_cat SET DEFAULT nextval('categorias_id_cat_seq'::regclass);


--
-- Name: id_curso; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cursos ALTER COLUMN id_curso SET DEFAULT nextval('cursos_id_curso_seq'::regclass);


--
-- Name: id_dia; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY dia ALTER COLUMN id_dia SET DEFAULT nextval('dia_id_dia_seq'::regclass);


--
-- Name: id_disc; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY disciplinas ALTER COLUMN id_disc SET DEFAULT nextval('disciplinas_id_disc_seq'::regclass);


--
-- Name: id_est; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estagios ALTER COLUMN id_est SET DEFAULT nextval('estagios_id_est_seq'::regclass);


--
-- Name: id_event; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY eventos ALTER COLUMN id_event SET DEFAULT nextval('eventos_id_event_seq'::regclass);


--
-- Name: id_im; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY imagens_noticias ALTER COLUMN id_im SET DEFAULT nextval('imagens_noticias_id_im_seq'::regclass);


--
-- Name: id_inst; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY instituto ALTER COLUMN id_inst SET DEFAULT nextval('instituto_id_inst_seq'::regclass);


--
-- Name: id_lo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY local ALTER COLUMN id_lo SET DEFAULT nextval('local_id_lo_seq'::regclass);


--
-- Name: id_monit; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY monitorias ALTER COLUMN id_monit SET DEFAULT nextval('monitorias_id_monit_seq'::regclass);


--
-- Name: id_not; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY noticias ALTER COLUMN id_not SET DEFAULT nextval('noticias_id_not_seq'::regclass);


--
-- Name: id_perm; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY permissaoteste ALTER COLUMN id_perm SET DEFAULT nextval('permissaoteste_id_perm_seq'::regclass);


--
-- Name: id_perm; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY permissions ALTER COLUMN id_perm SET DEFAULT nextval('permissions_id_perm_seq'::regclass);


--
-- Name: id_prog; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY programacao ALTER COLUMN id_prog SET DEFAULT nextval('programacao_id_prog_seq'::regclass);


--
-- Name: id_sem; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY semestre ALTER COLUMN id_sem SET DEFAULT nextval('semestre_id_sem_seq'::regclass);


--
-- Name: id_set; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY setores ALTER COLUMN id_set SET DEFAULT nextval('setores_id_set_seq'::regclass);


--
-- Name: id_sta; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY status ALTER COLUMN id_sta SET DEFAULT nextval('status_id_sta_seq'::regclass);


--
-- Name: id_type; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usertype ALTER COLUMN id_type SET DEFAULT nextval('usertype_id_type_seq'::regclass);


--
-- Name: id_user; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuarios ALTER COLUMN id_user SET DEFAULT nextval('usuarios_id_user_seq'::regclass);


--
-- Data for Name: alimentos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO alimentos VALUES (1, 'Arroz');
INSERT INTO alimentos VALUES (2, 'Feijão');
INSERT INTO alimentos VALUES (3, 'Lasanha');
INSERT INTO alimentos VALUES (4, 'Salada');
INSERT INTO alimentos VALUES (5, 'Bife');


--
-- Data for Name: alimentos_cardapios; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO alimentos_cardapios VALUES (3, 1);
INSERT INTO alimentos_cardapios VALUES (3, 2);
INSERT INTO alimentos_cardapios VALUES (5, 2);
INSERT INTO alimentos_cardapios VALUES (5, 5);
INSERT INTO alimentos_cardapios VALUES (6, 3);
INSERT INTO alimentos_cardapios VALUES (6, 4);
INSERT INTO alimentos_cardapios VALUES (7, 2);
INSERT INTO alimentos_cardapios VALUES (7, 3);
INSERT INTO alimentos_cardapios VALUES (8, 1);
INSERT INTO alimentos_cardapios VALUES (8, 2);
INSERT INTO alimentos_cardapios VALUES (8, 3);
INSERT INTO alimentos_cardapios VALUES (8, 4);


--
-- Name: alimentos_id_ali_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('alimentos_id_ali_seq', 5, true);


--
-- Data for Name: assistencias; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO assistencias VALUES (1, 'Auxílio-alimentação', 'Propicia condições para o atendimento das necessidades de alimentação básica dos estudantes, através do fornecimento de bolsas ou de refeições em restaurantes próprios, terceirizados e/ou conveniados.');
INSERT INTO assistencias VALUES (2, 'Auxílio Moradia', 'Propicia condições de moradia aos estudantes, cujas famílias residam em localidades distantes dos campi, através de bolsas ou alojamento próprio, terceirizado e/ou conveniado.');
INSERT INTO assistencias VALUES (3, 'Auxílio Transporte', 'Propicia o deslocamento dos estudantes que necessitem de transporte coletivo, através do fornecimento de bolsas ou vale-transporte de empresas conveniadas e/ou de linhas regulares.');
INSERT INTO assistencias VALUES (4, 'Auxílio Material Escolar', 'O auxílio material escolar visa subsidiar o material necessário ao desenvolvimento das atividades acadêmicas, na modalidade de auxílio financeiro.');
INSERT INTO assistencias VALUES (5, 'Auxílio Emergencial', 'O auxílio emergencial será concedido, através de auxílio financeiro, em situações pontuais para o atendimento de necessidades, esgotadas as possibilidades oferecidas pelo Sistema Único de Saúde (SUS).

 ');
INSERT INTO assistencias VALUES (6, 'Auxílio à participação estudantil em eventos', 'Propicia a participação dos estudantes em eventos educativos, tais como cursos, congressos, seminários, microestágios, entre outros.');
INSERT INTO assistencias VALUES (7, 'Acompanhamento biopsicossocial-pedagógico', 'Ação de incentivo que prevê o atendimento ao estudante por uma equipe multidisciplinar constituída por assistente social, psicólogo, orientador educacional entre outros profissionais com a finalidade de alcançar o desempenho escolar.');


--
-- Name: assistencias_id_assist_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('assistencias_id_assist_seq', 7, true);


--
-- Data for Name: cardapios; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cardapios VALUES (3, 1, '2016-03-15');
INSERT INTO cardapios VALUES (5, 2, '2016-03-16');
INSERT INTO cardapios VALUES (6, 3, '2016-03-17');
INSERT INTO cardapios VALUES (7, 4, '2016-03-18');
INSERT INTO cardapios VALUES (8, 5, '2016-03-19');


--
-- Name: cardapios_id_card_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cardapios_id_card_seq', 8, true);


--
-- Data for Name: categorias; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO categorias VALUES (1, 'Processo Seletivo');
INSERT INTO categorias VALUES (2, 'Estágios');
INSERT INTO categorias VALUES (3, 'Assistência Estudantil');
INSERT INTO categorias VALUES (4, 'Cursos Técnicos');
INSERT INTO categorias VALUES (5, 'Matrículas/Rematriculas');
INSERT INTO categorias VALUES (6, 'Semana Acadêmica');
INSERT INTO categorias VALUES (7, 'Comunicado');
INSERT INTO categorias VALUES (8, 'Vestibular');
INSERT INTO categorias VALUES (9, 'Simpósio');


--
-- Name: categorias_id_cat_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('categorias_id_cat_seq', 9, true);


--
-- Data for Name: categorias_noticias; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO categorias_noticias VALUES (1, 1);
INSERT INTO categorias_noticias VALUES (5, 1);
INSERT INTO categorias_noticias VALUES (1, 2);
INSERT INTO categorias_noticias VALUES (7, 2);
INSERT INTO categorias_noticias VALUES (1, 3);
INSERT INTO categorias_noticias VALUES (4, 3);
INSERT INTO categorias_noticias VALUES (8, 3);


--
-- Data for Name: cursos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cursos VALUES (1, 'Curso Superior de Tecnologia em Sistemas para Internet', 1, 'Nível de Ensino: Graduação 
Turno(s): Manhã ou tarde, com ingresso alternado
Modalidade: Presencial
Regime: Semestral
Título: Tecnólogo em Sistemas para Internet
Carga Horária: 2.175h
Duração: seis semestres
Estágio: não obrigatório
Ingresso: Anual

Perfil: O egresso do Curso Superior de Tecnologia em Desenvolvimento de Sistemas para Internet deverá ter uma formação ética, técnica, criativa e humanística, que possibilite, ao futuro profissional, ser um cidadão responsável, empreendedor, investigador e crítico, apto a desempenhar sua profissão, interagindo em uma sociedade plena de transformações, no que concerne ao desenvolvimento de sistemas de informação para a internet e às tecnologias associadas a estes processos. O enfoque do curso proposto é voltado para web, em que serão trabalhadas competências relacionadas às áreas de programação, a banco de dados e a redes de computadores. 

Campo de Atuação: Os futuros egressos do curso estarão aptos para assumir os seguintes postos identificáveis no mercado de trabalho local e regional: administrador de banco de dados; administrador de redes; administrador de sistema operacional; analista de aplicações web; analista de desenvolvimento de sistemas; analista de sistemas; analista de suporte; analista de ti; consultor de informática; consultor de sistemas; desenvolvedor de sistemas; desenvolvedor web; programador de computador; programador web; web designer.', 'files/_8415_TSI-LOGO2.png');
INSERT INTO cursos VALUES (2, 'Bacharelado em Design', 1, 'Nível de Ensino: Graduação 
Turno(s): Noite
Modalidade: Presencial
Regime: Semestral
Título: Bacharel em Design
Carga Horária: 2.920h
Duração: quatro anos
Estágio: não obrigatório
Ingresso: Anual

Perfil: O curso de bacharelado em Design oferece formação superior em Design, possibilitando ao aluno elaborar soluções de projeto no campo bidimensional e tridimensional para problemas de comunicação, informação, interação e uso, concernentes a diversos artefatos mediadores de ações e relações humanas, visando desenvolver a capacidade analítica, crítica e expressiva, integrada à realidade contemporânea. Assim sendo, o perfil profissional do Bacharel em Design será caracterizado pela capacidade de desenvolver projetos voltados tanto à mídia impressa e digital como também à comunicação em conformação tridimensional (produtos) e suas relações com o espaço em que se inserem (ambiente). Deverá atingir uma postura profissional com visão crítica e humanista, desenvolver capacidade de utilização de tecnologias, atentar às questões da sustentabilidade e desempenhar atividades de caráter criativo, técnico e científico, agregando valor e diferencial aos projetos desenvolvidos.

Campo de Atuação: O Bacharel em Design pode atuar em diversos segmentos que pesquisam, desenvolvem e solucionam questões próprias da área, como escritórios de design, editoras, agências de publicidade e propaganda, agências de mídias digitais, setores de marketing e design, setores de design de interiores, atividades autônomas e instituições públicas e privadas.', '');
INSERT INTO cursos VALUES (3, 'Curso Superior de Tecnologia em Análise e Desenvolvimento de Sistemas', 2, 'Objetiva formar profissionais para atuar na área de Informática com visão global e multidisciplinar do setor, instrumentalizados com embasamento teórico, prático e tecnológico. Estes profissionais estarão habilitados a identificar, planejar e executar atividades de desenvolvimento, implementação e gerenciamento de sistemas de informação, dando ênfase a conhecimentos práticos em TI e suas áreas de conhecimento, como Análise de Sistemas, Desenvolvimento de Software, Programação Web, entre outras.', '');


--
-- Name: cursos_id_curso_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cursos_id_curso_seq', 3, true);


--
-- Data for Name: dia; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO dia VALUES (1, 'Segunda-Feira');
INSERT INTO dia VALUES (2, 'Terça-Feira');
INSERT INTO dia VALUES (3, 'Quarta-Feira');
INSERT INTO dia VALUES (4, 'Quinta-Feira');
INSERT INTO dia VALUES (5, 'Sexta-Feira');


--
-- Name: dia_id_dia_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('dia_id_dia_seq', 5, true);


--
-- Data for Name: disciplinas; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO disciplinas VALUES (1, 'Linguagens de Programação para Web', 1);
INSERT INTO disciplinas VALUES (2, 'Arquitetura', 2);
INSERT INTO disciplinas VALUES (3, 'Maquinas agricolas', 3);


--
-- Name: disciplinas_id_disc_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('disciplinas_id_disc_seq', 3, true);


--
-- Data for Name: estagio_cursos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO estagio_cursos VALUES (1, 2);
INSERT INTO estagio_cursos VALUES (1, 1);


--
-- Data for Name: estagios; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO estagios VALUES (1, 'Teste3', 364.00, 'teste2', 'teste22', 'teste2', 'teste2');


--
-- Name: estagios_id_est_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('estagios_id_est_seq', 1, true);


--
-- Data for Name: eventos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO eventos VALUES (1, 'Brainstorm 2 - Semana Acadêmica Design IFSul', 6, '2016-05-10', '2016-05-15', '18h - 22h30', 'Teste', 'files/_2680_4f6006e6b3e365d90b6166f926b8f868.png');
INSERT INTO eventos VALUES (2, 'SASPI - Semana acadêmica de Sistemas para Internet', 6, '2016-12-10', '2015-12-15', '19h15 - 23h15', 'Teste', 'files/_7672_12207711_902318969849047_2083681106_n.jpg');


--
-- Name: eventos_id_event_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('eventos_id_event_seq', 2, true);


--
-- Data for Name: imagens_noticias; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO imagens_noticias VALUES (1, 'files/_5822_Id4HuM1.jpg', 1);
INSERT INTO imagens_noticias VALUES (2, 'files/_4943_nnjGHk0.jpg', 2);
INSERT INTO imagens_noticias VALUES (3, 'files/_5868_vestibular_portal.png', 3);


--
-- Name: imagens_noticias_id_im_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('imagens_noticias_id_im_seq', 3, true);


--
-- Data for Name: instituto; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO instituto VALUES (1, 'IFSul - Campus Pelotas');
INSERT INTO instituto VALUES (2, 'Outra Instituição');


--
-- Name: instituto_id_inst_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('instituto_id_inst_seq', 2, true);


--
-- Data for Name: local; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO local VALUES (1, 'Lab-5 (319-a) -  TSI');
INSERT INTO local VALUES (2, 'Laboratórios Telecomunicações');
INSERT INTO local VALUES (3, 'Sala de desenho técnico do Design');


--
-- Name: local_id_lo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('local_id_lo_seq', 3, true);


--
-- Data for Name: monitorias; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO monitorias VALUES (1, 1, 2, 1, 1, 'Todos os dias as 14h!!');
INSERT INTO monitorias VALUES (2, 2, 5, 3, 2, 'Todos os dias a partir das 15h30');


--
-- Name: monitorias_id_monit_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('monitorias_id_monit_seq', 2, true);


--
-- Data for Name: noticias; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO noticias VALUES (1, 'Segunda chamada do Sisu: divulgadas listas dos câmpus Camaquã e Charqueadas', 'Listas dos convocados, datas, horários e locais das chamadas constam nos documentos', '<h1>Segunda chamada do Sisu: divulgadas listas dos c&acirc;mpus Camaqu&atilde; e Charqueadas</h1>

<p>Listas dos convocados, datas, hor&aacute;rios e locais das chamadas constam nos documento</p>

<p>Os c&acirc;mpus Camaqu&atilde; e Charqueadas t&ecirc;m suas listas de convocados para a segunda chamada oral do Sistema de Sele&ccedil;&atilde;o Unificada (Sisu) divulgadas. As datas, os hor&aacute;rios e os locais das chamadas constam nos documentos (confira abaixo).</p>

<p>O candidato convocado dever&aacute; comparecer &agrave; chamada oral com toda a documenta&ccedil;&atilde;o necess&aacute;ria para a realiza&ccedil;&atilde;o da matr&iacute;cula. Os candidatos ser&atilde;o chamados oralmente at&eacute; o preenchimento de todas as vagas remanescentes, n&atilde;o havendo garantia de vaga aos candidatos convocados, mesmo que presentes na chamada oral. Todos os candidatos devem estar no local com 30 minutos de anteced&ecirc;ncia para assinatura da ata de presen&ccedil;a.</p>

<p>Aquele que n&atilde;o apresentar todos os documentos exigidos no momento da chamada oral, n&atilde;o ter&aacute; sua matr&iacute;cula efetivada e perder&aacute; o direito &agrave; vaga. Todos os documentos dever&atilde;o estar perfeitamente leg&iacute;veis e isentos de rasuras.</p>

<p><a href="http://processoseletivo.ifsul.edu.br/index.php?option=com_docman&amp;task=cat_view&amp;gid=729&amp;Itemid=436">Clique aqui</a>&nbsp;para conferir as listas e os editais.</p>

<ul>
</ul>
', '2016-03-13', '19:50:00', 2, 1, 'http://www.ifsul.edu.br/ultimas-noticias/578-segunda-chamada-do-sisu-divulgadas-listas-dos-campus-camaqua-e-charqueadas');
INSERT INTO noticias VALUES (2, 'Vestibular de Verão/2016: divulgados os locais de prova para o câmpus Pelotas - Visconde da Graça', 'As provas ocorrem no dia 06 de março', '<h1>Vestibular de Ver&atilde;o/2016: divulgados os locais de prova para o c&acirc;mpus Pelotas - Visconde da Gra&ccedil;a</h1>

<ul>
</ul>

<p>As provas ocorrem no dia 06 de mar&ccedil;o</p>

<p>Os candidatos que concorrem &agrave;s vagas nos cursos t&eacute;cnicos em agroind&uacute;stria, agropecu&aacute;ria, meio ambiente e vestu&aacute;rio j&aacute; podem conferir seus locais de prova, que ser&atilde;o realizadas no dia 06 de mar&ccedil;o, nos&nbsp;seguintes hor&aacute;rios:</p>

<p>Pela manh&atilde;: &nbsp;9h - Forma Subsequente;</p>

<p>Pela tarde: 16h - &nbsp;Forma Integrada.</p>

<p>Os candidatos dever&atilde;o&nbsp;comparecer ao local da prova com 30min de anteced&ecirc;ncia, munidos de&nbsp;documento de identidade e caneta esferogr&aacute;fica azul ou preta, l&aacute;pis e borracha.</p>

<p>N&atilde;o ser&atilde;o aceitos documentos onde se l&ecirc; &ldquo;n&atilde;o alfabetizado&rdquo;.</p>

<p><a href="http://processoseletivo.ifsul.edu.br/index.php?option=com_docman&amp;Itemid=437">Confira aqui</a>&nbsp;os locais para realiza&ccedil;&atilde;o da prova do Vestibular de Ver&atilde;o/2016 do c&acirc;mpus Pelotas-Visconde da Gra&ccedil;a.</p>
', '2016-03-13', '20:00:00', 2, 1, 'http://www.ifsul.edu.br/ultimas-noticias/570-divulgados-os-locais-de-prova-para-o-campus-pelotas-visconde-da-graca');
INSERT INTO noticias VALUES (3, 'Estão abertas as pré-inscrições para o Vestibular de Inverno do IFSul', 'Os interessados têm até o dia 1º de junho para realizarem as pré-inscrições para os cursos técnicos oferecidos pelo instituto.', '<h1>Est&atilde;o abertas as pr&eacute;-inscri&ccedil;&otilde;es para o Vestibular de Inverno do IFSul</h1>

<p>Os interessados t&ecirc;m at&eacute; o dia 1&ordm; de junho para realizarem as pr&eacute;-inscri&ccedil;&otilde;es para os cursos t&eacute;cnicos oferecidos pelo instituto.</p>

<p>Que tal tra&ccedil;ar uma nova rota para o seu futuro? Este &eacute; o convite que o IFSul est&aacute; fazendo aos interessados nos cursos t&eacute;cnicos oferecidos no Vestibular de Inverno 2016. As pr&eacute;-inscri&ccedil;&otilde;es come&ccedil;aram hoje e v&atilde;o estar abertas at&eacute; o dia 1&ordm; de junho. Nessa etapa, os interessados devem acessar a p&aacute;gina do&nbsp;<a href="http://processoseletivo.ifsul.edu.br/vestibular-de-inverno-2016">processo seletivo</a>, onde tamb&eacute;m est&aacute; dispon&iacute;vel o edital completo, e preencher o formul&aacute;rio de pr&eacute;-inscri&ccedil;&atilde;o com os dados requeridos, informando em qual curso desejam disputar uma vaga. A inscri&ccedil;&atilde;o no vestibular &eacute; gratuita.</p>

<p>Para o preenchimento das informa&ccedil;&otilde;es pessoais, o candidato deve utilizar o documento de identidade e CPF. N&atilde;o ser&atilde;o aceitos documentos de identifica&ccedil;&atilde;o que contenham a marca &ldquo;n&atilde;o alfabetizado&rdquo;. Os vestibulandos tamb&eacute;m devem ficar atentos ao prazo de confirma&ccedil;&atilde;o das pr&eacute;-inscri&ccedil;&otilde;es, que ocorre entre 2 e 6 de junho, no mesmo site.</p>

<p>As provas, marcadas para o dia 26 de junho, ser&atilde;o aplicadas em todas as cidades com ofertas de vagas, e o vestibulando realizar&aacute; sua prova na cidade para a qual se inscreveu. A sele&ccedil;&atilde;o ocorrer&aacute; nos c&acirc;mpus Bag&eacute;, Camaqu&atilde;, Jaguar&atilde;o, Lajeado, Novo Hamburgo, Passo Fundo, Pelotas, Pelotas- Visconde da Gra&ccedil;a, Santana do Livramento e Ven&acirc;ncio Aires.</p>

<p>No processo seletivo, ser&atilde;o oferecidas vagas para cursos t&eacute;cnicos nas formas integrada, subsequente e concomitante. A quantidade de vagas e os cursos oferecidos em cada c&acirc;mpus podem ser conferidos no plano de vagas disponibilizado na p&aacute;gina do&nbsp;<a href="http://processoseletivo.ifsul.edu.br/vestibular-de-inverno-2016">processo seletivo</a>.</p>

<p>&nbsp;</p>

<p><a href="http://processoseletivo.ifsul.edu.br/vestibular-de-inverno-2016">Para conferir mais informa&ccedil;&otilde;es, acessar o edital ou realizar a pr&eacute;-inscri&ccedil;&atilde;o, clique aqui e embarque no seu futuro!</a></p>
', '2016-05-07', '20:19:00', 1, 4, 'http://www.ifsul.edu.br/component/content/article?id=674');


--
-- Name: noticias_id_not_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('noticias_id_not_seq', 3, true);


--
-- Data for Name: permissaoteste; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO permissaoteste VALUES (2, 5, '/editor/noticias.html', '/editor/cardapios.html', '');
INSERT INTO permissaoteste VALUES (3, 6, '', '/editor/cardapios.html', '/editor/cursos.html');
INSERT INTO permissaoteste VALUES (4, 4, '', '/editor/cardapios.html', '');


--
-- Name: permissaoteste_id_perm_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('permissaoteste_id_perm_seq', 4, true);


--
-- Data for Name: permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO permissions VALUES (1, 21, 'Permitido', '', 'Permitido', 'Permitido', '', 'Permitido', 'Permitido', '', 'Permitido', '');
INSERT INTO permissions VALUES (2, 22, 'Permitido', 'Permitido', 'Permitido', 'Permitido', 'Permitido', 'Permitido', 'Permitido', 'Permitido', 'Permitido', 'Permitido');


--
-- Name: permissions_id_perm_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('permissions_id_perm_seq', 2, true);


--
-- Data for Name: programacao; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: programacao_id_prog_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('programacao_id_prog_seq', 1, false);


--
-- Data for Name: semestre; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO semestre VALUES (1, '1º Semestre');
INSERT INTO semestre VALUES (2, '2º Semestre');
INSERT INTO semestre VALUES (3, '3º Semestre');
INSERT INTO semestre VALUES (4, '4º Semestre');
INSERT INTO semestre VALUES (5, '5º Semestre');
INSERT INTO semestre VALUES (6, '6º Semestre');
INSERT INTO semestre VALUES (7, '7º Semestre');
INSERT INTO semestre VALUES (8, '8º Semestre');
INSERT INTO semestre VALUES (9, '9º Semestre');
INSERT INTO semestre VALUES (10, '10º Semestre');
INSERT INTO semestre VALUES (11, '11º Semestre');
INSERT INTO semestre VALUES (12, '12º Semestre');


--
-- Name: semestre_id_sem_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('semestre_id_sem_seq', 12, true);


--
-- Data for Name: setores; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO setores VALUES (1, 'Cosie - Setor de Estágios do IFSul (Campus Pelotas)', 'Divulgação de oportunidades de estágio e emprego.

53 2123-1132');


--
-- Name: setores_id_set_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('setores_id_set_seq', 1, true);


--
-- Data for Name: status; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO status VALUES (1, 'Sob Avaliação!');
INSERT INTO status VALUES (2, 'Rejeitado!');
INSERT INTO status VALUES (3, 'Editado!');
INSERT INTO status VALUES (4, 'Publicado!');
INSERT INTO status VALUES (5, 'Publicado e editado!');


--
-- Name: status_id_sta_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('status_id_sta_seq', 5, true);


--
-- Data for Name: usertype; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO usertype VALUES (1, 'Autor');
INSERT INTO usertype VALUES (2, 'Editor');
INSERT INTO usertype VALUES (3, 'Administrador');


--
-- Name: usertype_id_type_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('usertype_id_type_seq', 3, true);


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO usuarios VALUES (1, 'Administrador', 'admin@admin.com', 'admin', 3);
INSERT INTO usuarios VALUES (3, 'Autor', 'autor@autor.com', 'senha5', 1);
INSERT INTO usuarios VALUES (4, 'Hazard', 'hazard@hazard.com', 'senha5', 2);
INSERT INTO usuarios VALUES (5, 'Messi', 'messi@messi.com', 'senha5', 2);
INSERT INTO usuarios VALUES (6, 'Neymar', 'neymar@neymar.com', 'senha5', 2);
INSERT INTO usuarios VALUES (20, 'Cech', 'cech@cech.com', 'senha5', 2);
INSERT INTO usuarios VALUES (21, 'Iniesta', 'iniesta@iniesta.com', 'senha5', 2);
INSERT INTO usuarios VALUES (22, 'Mercer', 'mercer@mercer.com', 'senha5', 2);


--
-- Name: usuarios_id_user_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('usuarios_id_user_seq', 22, true);


--
-- Name: alimentos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY alimentos
    ADD CONSTRAINT alimentos_pkey PRIMARY KEY (id_ali);


--
-- Name: assistencias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY assistencias
    ADD CONSTRAINT assistencias_pkey PRIMARY KEY (id_assist);


--
-- Name: cardapios_dia_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cardapios
    ADD CONSTRAINT cardapios_dia_key UNIQUE (dia);


--
-- Name: cardapios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cardapios
    ADD CONSTRAINT cardapios_pkey PRIMARY KEY (id_card);


--
-- Name: categorias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (id_cat);


--
-- Name: cursos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cursos
    ADD CONSTRAINT cursos_pkey PRIMARY KEY (id_curso);


--
-- Name: dia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY dia
    ADD CONSTRAINT dia_pkey PRIMARY KEY (id_dia);


--
-- Name: disciplinas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY disciplinas
    ADD CONSTRAINT disciplinas_pkey PRIMARY KEY (id_disc);


--
-- Name: estagios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY estagios
    ADD CONSTRAINT estagios_pkey PRIMARY KEY (id_est);


--
-- Name: eventos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY eventos
    ADD CONSTRAINT eventos_pkey PRIMARY KEY (id_event);


--
-- Name: imagens_noticias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY imagens_noticias
    ADD CONSTRAINT imagens_noticias_pkey PRIMARY KEY (id_im);


--
-- Name: instituto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY instituto
    ADD CONSTRAINT instituto_pkey PRIMARY KEY (id_inst);


--
-- Name: local_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY local
    ADD CONSTRAINT local_pkey PRIMARY KEY (id_lo);


--
-- Name: monitorias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY monitorias
    ADD CONSTRAINT monitorias_pkey PRIMARY KEY (id_monit);


--
-- Name: noticias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY noticias
    ADD CONSTRAINT noticias_pkey PRIMARY KEY (id_not);


--
-- Name: permissaoteste_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY permissaoteste
    ADD CONSTRAINT permissaoteste_pkey PRIMARY KEY (id_perm);


--
-- Name: permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (id_perm);


--
-- Name: programacao_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY programacao
    ADD CONSTRAINT programacao_pkey PRIMARY KEY (id_prog);


--
-- Name: semestre_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY semestre
    ADD CONSTRAINT semestre_pkey PRIMARY KEY (id_sem);


--
-- Name: setores_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY setores
    ADD CONSTRAINT setores_pkey PRIMARY KEY (id_set);


--
-- Name: status_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY status
    ADD CONSTRAINT status_pkey PRIMARY KEY (id_sta);


--
-- Name: usertype_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usertype
    ADD CONSTRAINT usertype_pkey PRIMARY KEY (id_type);


--
-- Name: usuarios_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_email_key UNIQUE (email);


--
-- Name: usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id_user);


--
-- Name: alimentos_cardapios_ali_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY alimentos_cardapios
    ADD CONSTRAINT alimentos_cardapios_ali_id_fkey FOREIGN KEY (ali_id) REFERENCES alimentos(id_ali) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: alimentos_cardapios_card_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY alimentos_cardapios
    ADD CONSTRAINT alimentos_cardapios_card_id_fkey FOREIGN KEY (card_id) REFERENCES cardapios(id_card) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: cardapios_dia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cardapios
    ADD CONSTRAINT cardapios_dia_fkey FOREIGN KEY (dia) REFERENCES dia(id_dia) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: categorias_noticias_cat_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY categorias_noticias
    ADD CONSTRAINT categorias_noticias_cat_id_fkey FOREIGN KEY (cat_id) REFERENCES categorias(id_cat) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: categorias_noticias_not_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY categorias_noticias
    ADD CONSTRAINT categorias_noticias_not_id_fkey FOREIGN KEY (not_id) REFERENCES noticias(id_not) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: cursos_inst_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cursos
    ADD CONSTRAINT cursos_inst_id_fkey FOREIGN KEY (inst_id) REFERENCES instituto(id_inst);


--
-- Name: estagio_cursos_curso_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estagio_cursos
    ADD CONSTRAINT estagio_cursos_curso_id_fkey FOREIGN KEY (curso_id) REFERENCES cursos(id_curso) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: estagio_cursos_est_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estagio_cursos
    ADD CONSTRAINT estagio_cursos_est_id_fkey FOREIGN KEY (est_id) REFERENCES estagios(id_est) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: eventos_event_cat_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY eventos
    ADD CONSTRAINT eventos_event_cat_fkey FOREIGN KEY (event_cat) REFERENCES categorias(id_cat) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: imagens_noticias_noticia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY imagens_noticias
    ADD CONSTRAINT imagens_noticias_noticia_fkey FOREIGN KEY (noticia) REFERENCES noticias(id_not) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: monitorias_disciplina_m_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY monitorias
    ADD CONSTRAINT monitorias_disciplina_m_fkey FOREIGN KEY (disciplina_m) REFERENCES disciplinas(id_disc) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: monitorias_sala_m_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY monitorias
    ADD CONSTRAINT monitorias_sala_m_fkey FOREIGN KEY (sala_m) REFERENCES local(id_lo) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: monitorias_semestre_m_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY monitorias
    ADD CONSTRAINT monitorias_semestre_m_fkey FOREIGN KEY (semestre_m) REFERENCES semestre(id_sem) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: noticias_status_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY noticias
    ADD CONSTRAINT noticias_status_fkey FOREIGN KEY (status) REFERENCES status(id_sta) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: permissaoteste_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY permissaoteste
    ADD CONSTRAINT permissaoteste_user_id_fkey FOREIGN KEY (user_id) REFERENCES usuarios(id_user) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: usuarios_type_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_type_id_fkey FOREIGN KEY (type_id) REFERENCES usertype(id_type) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

