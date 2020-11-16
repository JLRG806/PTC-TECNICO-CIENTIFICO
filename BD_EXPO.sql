--
-- PostgreSQL database dump
--

-- Dumped from database version 12.3
-- Dumped by pg_dump version 12.0

-- Started on 2020-11-16 12:29:14

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 202 (class 1259 OID 17068)
-- Name: aulas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.aulas (
    id_aula integer NOT NULL,
    nombre_aula character varying(20),
    ubicacion_aula character varying(100),
    imagen_aula character varying(255)
);


ALTER TABLE public.aulas OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 17071)
-- Name: aulas_id_aula_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.aulas_id_aula_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.aulas_id_aula_seq OWNER TO postgres;

--
-- TOC entry 3027 (class 0 OID 0)
-- Dependencies: 203
-- Name: aulas_id_aula_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.aulas_id_aula_seq OWNED BY public.aulas.id_aula;


--
-- TOC entry 204 (class 1259 OID 17073)
-- Name: bitacora; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.bitacora (
    id_bitacora integer NOT NULL,
    accion character varying(100),
    persona character varying(40),
    fecha_hora timestamp without time zone,
    tipo_bitacora character varying(30)
);


ALTER TABLE public.bitacora OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 17076)
-- Name: bitacora_id_bitacora_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.bitacora_id_bitacora_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.bitacora_id_bitacora_seq OWNER TO postgres;

--
-- TOC entry 3028 (class 0 OID 0)
-- Dependencies: 205
-- Name: bitacora_id_bitacora_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.bitacora_id_bitacora_seq OWNED BY public.bitacora.id_bitacora;


--
-- TOC entry 206 (class 1259 OID 17078)
-- Name: detalle_proyecto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.detalle_proyecto (
    id_det_proyecto integer NOT NULL,
    id_proyecto integer,
    id_estudiante integer,
    puesto_estudiante character varying(20),
    CONSTRAINT detalle_proyecto_puesto_estudiante_check CHECK (((puesto_estudiante)::text = ANY (ARRAY[('Coordinador'::character varying)::text, ('Sub-coordinador'::character varying)::text, ('Tesorero'::character varying)::text, ('Secretario'::character varying)::text, ('Vocero'::character varying)::text])))
);


ALTER TABLE public.detalle_proyecto OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 17082)
-- Name: detalle_proyecto_id_det_proyecto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.detalle_proyecto_id_det_proyecto_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.detalle_proyecto_id_det_proyecto_seq OWNER TO postgres;

--
-- TOC entry 3029 (class 0 OID 0)
-- Dependencies: 207
-- Name: detalle_proyecto_id_det_proyecto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.detalle_proyecto_id_det_proyecto_seq OWNED BY public.detalle_proyecto.id_det_proyecto;


--
-- TOC entry 208 (class 1259 OID 17084)
-- Name: docentes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.docentes (
    id_docente integer NOT NULL,
    nombre_docente character varying(80),
    email_docente character varying(100),
    edad_docente date,
    telefono_docente character varying(15),
    dui_docente character varying(15)
);


ALTER TABLE public.docentes OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 17087)
-- Name: docentes_id_docente_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.docentes_id_docente_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.docentes_id_docente_seq OWNER TO postgres;

--
-- TOC entry 3030 (class 0 OID 0)
-- Dependencies: 209
-- Name: docentes_id_docente_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.docentes_id_docente_seq OWNED BY public.docentes.id_docente;


--
-- TOC entry 210 (class 1259 OID 17089)
-- Name: equipo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.equipo (
    id_equipo integer NOT NULL,
    nombre_equipo character varying(30) NOT NULL,
    descripcion_equipo character varying(200),
    cantidad integer NOT NULL,
    id_estudiante integer,
    id_tipo_equipo integer,
    estado_equipo character varying(30) DEFAULT 'Pendiente de confirmar entrada'::character varying,
    imagen_equipo character varying(250),
    CONSTRAINT equipo_estado_equipo_check CHECK (((estado_equipo)::text = ANY (ARRAY[('Pendiente de confirmar entrada'::character varying)::text, ('Entrada Confirmada'::character varying)::text, ('Pendiente de confirmar salida'::character varying)::text, ('Salida Confirmada'::character varying)::text])))
);


ALTER TABLE public.equipo OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 17097)
-- Name: equipo_id_equipo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.equipo_id_equipo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.equipo_id_equipo_seq OWNER TO postgres;

--
-- TOC entry 3031 (class 0 OID 0)
-- Dependencies: 211
-- Name: equipo_id_equipo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.equipo_id_equipo_seq OWNED BY public.equipo.id_equipo;


--
-- TOC entry 212 (class 1259 OID 17099)
-- Name: especialidad; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.especialidad (
    id_especialidad integer NOT NULL,
    especialidad_estudiante character varying(25)
);


ALTER TABLE public.especialidad OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 17102)
-- Name: especialidad_id_especialidad_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.especialidad_id_especialidad_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.especialidad_id_especialidad_seq OWNER TO postgres;

--
-- TOC entry 3032 (class 0 OID 0)
-- Dependencies: 213
-- Name: especialidad_id_especialidad_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.especialidad_id_especialidad_seq OWNED BY public.especialidad.id_especialidad;


--
-- TOC entry 214 (class 1259 OID 17104)
-- Name: estudiantes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.estudiantes (
    id_estudiante integer NOT NULL,
    nombre_estudiante character varying(80),
    apellidos_estudiante character varying(80),
    email_estudiante character varying(30),
    id_seccion integer,
    id_especialidad integer,
    codigo_estudiante numeric(8,0),
    contrasena_estudiante character varying(100),
    intentos_usuario character varying(20)
);


ALTER TABLE public.estudiantes OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 17107)
-- Name: estudiantes_id_estudiante_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.estudiantes_id_estudiante_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estudiantes_id_estudiante_seq OWNER TO postgres;

--
-- TOC entry 3033 (class 0 OID 0)
-- Dependencies: 215
-- Name: estudiantes_id_estudiante_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.estudiantes_id_estudiante_seq OWNED BY public.estudiantes.id_estudiante;


--
-- TOC entry 216 (class 1259 OID 17109)
-- Name: evaluacion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.evaluacion (
    id_evaluacion integer NOT NULL,
    id_grado integer,
    id_evaluador integer,
    id_proyecto integer,
    observaciones character varying(50)
);


ALTER TABLE public.evaluacion OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 17112)
-- Name: evaluacion_id_evaluacion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.evaluacion_id_evaluacion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.evaluacion_id_evaluacion_seq OWNER TO postgres;

--
-- TOC entry 3034 (class 0 OID 0)
-- Dependencies: 217
-- Name: evaluacion_id_evaluacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.evaluacion_id_evaluacion_seq OWNED BY public.evaluacion.id_evaluacion;


--
-- TOC entry 218 (class 1259 OID 17114)
-- Name: evaluadores; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.evaluadores (
    id_evaluador integer NOT NULL,
    nombre_evaluador character varying(40),
    apellidos_evaluador character varying(40),
    email_evaluador character varying(320),
    telefono_evaluador character varying(10),
    lugar_procedencia character varying(50),
    ocupacion character varying(30),
    estado_evaluador character varying(20) DEFAULT 'No asignado'::character varying,
    CONSTRAINT evaluadores_estado_evaluador_check CHECK (((estado_evaluador)::text = ANY (ARRAY[('Convocado'::character varying)::text, ('No asignado'::character varying)::text, ('Presente'::character varying)::text, ('Evaluando'::character varying)::text, ('Nota pendiente de procesar'::character varying)::text, ('Nota procesada'::character varying)::text, ('Inactivo'::character varying)::text])))
);


ALTER TABLE public.evaluadores OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 17122)
-- Name: evaluadores_id_evaluador_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.evaluadores_id_evaluador_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.evaluadores_id_evaluador_seq OWNER TO postgres;

--
-- TOC entry 3035 (class 0 OID 0)
-- Dependencies: 219
-- Name: evaluadores_id_evaluador_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.evaluadores_id_evaluador_seq OWNED BY public.evaluadores.id_evaluador;


--
-- TOC entry 220 (class 1259 OID 17124)
-- Name: grados; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.grados (
    id_grado integer NOT NULL,
    id_aula integer,
    id_docente integer,
    id_seccion integer,
    id_especialidad integer
);


ALTER TABLE public.grados OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 17127)
-- Name: grados_id_grado_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.grados_id_grado_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.grados_id_grado_seq OWNER TO postgres;

--
-- TOC entry 3036 (class 0 OID 0)
-- Dependencies: 221
-- Name: grados_id_grado_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.grados_id_grado_seq OWNED BY public.grados.id_grado;


--
-- TOC entry 222 (class 1259 OID 17129)
-- Name: imagen_equipo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.imagen_equipo (
    id_imagen_equipo integer NOT NULL,
    id_equipo integer,
    imagen_equipo character varying(255)
);


ALTER TABLE public.imagen_equipo OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 17132)
-- Name: imagen_equipo_id_imagen_equipo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.imagen_equipo_id_imagen_equipo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.imagen_equipo_id_imagen_equipo_seq OWNER TO postgres;

--
-- TOC entry 3037 (class 0 OID 0)
-- Dependencies: 223
-- Name: imagen_equipo_id_imagen_equipo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.imagen_equipo_id_imagen_equipo_seq OWNED BY public.imagen_equipo.id_imagen_equipo;


--
-- TOC entry 224 (class 1259 OID 17134)
-- Name: niveles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.niveles (
    id_nivel integer NOT NULL,
    nivel_estudiante character varying(30)
);


ALTER TABLE public.niveles OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 17137)
-- Name: niveles_id_nivel_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.niveles_id_nivel_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.niveles_id_nivel_seq OWNER TO postgres;

--
-- TOC entry 3038 (class 0 OID 0)
-- Dependencies: 225
-- Name: niveles_id_nivel_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.niveles_id_nivel_seq OWNED BY public.niveles.id_nivel;


--
-- TOC entry 226 (class 1259 OID 17139)
-- Name: proyectos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.proyectos (
    id_proyecto integer NOT NULL,
    nombre_proyecto character varying(50),
    descripcion_proyecto character varying(255),
    codigo_proyecto character varying(15),
    id_grado integer
);


ALTER TABLE public.proyectos OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 17142)
-- Name: proyectos_id_proyecto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.proyectos_id_proyecto_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.proyectos_id_proyecto_seq OWNER TO postgres;

--
-- TOC entry 3039 (class 0 OID 0)
-- Dependencies: 227
-- Name: proyectos_id_proyecto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.proyectos_id_proyecto_seq OWNED BY public.proyectos.id_proyecto;


--
-- TOC entry 228 (class 1259 OID 17144)
-- Name: secciones; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.secciones (
    id_seccion integer NOT NULL,
    id_nivel integer,
    seccion_estudiante character varying(4)
);


ALTER TABLE public.secciones OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 17147)
-- Name: secciones_id_seccion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.secciones_id_seccion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.secciones_id_seccion_seq OWNER TO postgres;

--
-- TOC entry 3040 (class 0 OID 0)
-- Dependencies: 229
-- Name: secciones_id_seccion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.secciones_id_seccion_seq OWNED BY public.secciones.id_seccion;


--
-- TOC entry 230 (class 1259 OID 17149)
-- Name: tipo_equipo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipo_equipo (
    id_tipo_equipo integer NOT NULL,
    tipo_equipo character varying(20)
);


ALTER TABLE public.tipo_equipo OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 17152)
-- Name: tipo_equipo_id_tipo_equipo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tipo_equipo_id_tipo_equipo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_equipo_id_tipo_equipo_seq OWNER TO postgres;

--
-- TOC entry 3041 (class 0 OID 0)
-- Dependencies: 231
-- Name: tipo_equipo_id_tipo_equipo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tipo_equipo_id_tipo_equipo_seq OWNED BY public.tipo_equipo.id_tipo_equipo;


--
-- TOC entry 232 (class 1259 OID 17154)
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuarios (
    id_usuario integer NOT NULL,
    nombre_usuario character varying(80),
    email_usuario character varying(50),
    contrasena_usuario character varying(100),
    estado_usuario character varying(15) DEFAULT 'Activo'::character varying,
    foto_usuario character varying(215),
    intentos_usuario character varying(2),
    CONSTRAINT usuarios_estado_usuario_check CHECK (((estado_usuario)::text = ANY (ARRAY[('Activo'::character varying)::text, ('Inactivo'::character varying)::text])))
);


ALTER TABLE public.usuarios OWNER TO postgres;

--
-- TOC entry 233 (class 1259 OID 17159)
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuarios_id_usuario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuarios_id_usuario_seq OWNER TO postgres;

--
-- TOC entry 3042 (class 0 OID 0)
-- Dependencies: 233
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuarios_id_usuario_seq OWNED BY public.usuarios.id_usuario;


--
-- TOC entry 2779 (class 2604 OID 17161)
-- Name: aulas id_aula; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aulas ALTER COLUMN id_aula SET DEFAULT nextval('public.aulas_id_aula_seq'::regclass);


--
-- TOC entry 2780 (class 2604 OID 17162)
-- Name: bitacora id_bitacora; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bitacora ALTER COLUMN id_bitacora SET DEFAULT nextval('public.bitacora_id_bitacora_seq'::regclass);


--
-- TOC entry 2781 (class 2604 OID 17163)
-- Name: detalle_proyecto id_det_proyecto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.detalle_proyecto ALTER COLUMN id_det_proyecto SET DEFAULT nextval('public.detalle_proyecto_id_det_proyecto_seq'::regclass);


--
-- TOC entry 2783 (class 2604 OID 17164)
-- Name: docentes id_docente; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.docentes ALTER COLUMN id_docente SET DEFAULT nextval('public.docentes_id_docente_seq'::regclass);


--
-- TOC entry 2785 (class 2604 OID 17165)
-- Name: equipo id_equipo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.equipo ALTER COLUMN id_equipo SET DEFAULT nextval('public.equipo_id_equipo_seq'::regclass);


--
-- TOC entry 2787 (class 2604 OID 17166)
-- Name: especialidad id_especialidad; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.especialidad ALTER COLUMN id_especialidad SET DEFAULT nextval('public.especialidad_id_especialidad_seq'::regclass);


--
-- TOC entry 2788 (class 2604 OID 17167)
-- Name: estudiantes id_estudiante; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estudiantes ALTER COLUMN id_estudiante SET DEFAULT nextval('public.estudiantes_id_estudiante_seq'::regclass);


--
-- TOC entry 2789 (class 2604 OID 17168)
-- Name: evaluacion id_evaluacion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evaluacion ALTER COLUMN id_evaluacion SET DEFAULT nextval('public.evaluacion_id_evaluacion_seq'::regclass);


--
-- TOC entry 2791 (class 2604 OID 17169)
-- Name: evaluadores id_evaluador; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evaluadores ALTER COLUMN id_evaluador SET DEFAULT nextval('public.evaluadores_id_evaluador_seq'::regclass);


--
-- TOC entry 2793 (class 2604 OID 17170)
-- Name: grados id_grado; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.grados ALTER COLUMN id_grado SET DEFAULT nextval('public.grados_id_grado_seq'::regclass);


--
-- TOC entry 2794 (class 2604 OID 17171)
-- Name: imagen_equipo id_imagen_equipo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.imagen_equipo ALTER COLUMN id_imagen_equipo SET DEFAULT nextval('public.imagen_equipo_id_imagen_equipo_seq'::regclass);


--
-- TOC entry 2795 (class 2604 OID 17172)
-- Name: niveles id_nivel; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.niveles ALTER COLUMN id_nivel SET DEFAULT nextval('public.niveles_id_nivel_seq'::regclass);


--
-- TOC entry 2796 (class 2604 OID 17173)
-- Name: proyectos id_proyecto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.proyectos ALTER COLUMN id_proyecto SET DEFAULT nextval('public.proyectos_id_proyecto_seq'::regclass);


--
-- TOC entry 2797 (class 2604 OID 17174)
-- Name: secciones id_seccion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.secciones ALTER COLUMN id_seccion SET DEFAULT nextval('public.secciones_id_seccion_seq'::regclass);


--
-- TOC entry 2798 (class 2604 OID 17175)
-- Name: tipo_equipo id_tipo_equipo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo_equipo ALTER COLUMN id_tipo_equipo SET DEFAULT nextval('public.tipo_equipo_id_tipo_equipo_seq'::regclass);


--
-- TOC entry 2800 (class 2604 OID 17176)
-- Name: usuarios id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN id_usuario SET DEFAULT nextval('public.usuarios_id_usuario_seq'::regclass);


--
-- TOC entry 2990 (class 0 OID 17068)
-- Dependencies: 202
-- Data for Name: aulas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.aulas (id_aula, nombre_aula, ubicacion_aula, imagen_aula) FROM stdin;
2	63.23	Zona de Canchas	5f22f83f2a48d.jpg
5	81.14	Zona de chalet	5f2c4b851b285.png
6	63.24	Zona del loby	5f6d210700898.jpg
7	63.22	Zona del loby	5f6d211133e2c.jpg
8	63.25	Zona del loby	5f6d2118e9b3e.jpg
9	61.20	Zona de administracion	5f6d2166bac42.jpg
10	61.22	Zona de administracion	5f6d216d43eac.jpg
12	61.21	Zona de aministracion	5fb2be0f71144.png
\.


--
-- TOC entry 2992 (class 0 OID 17073)
-- Dependencies: 204
-- Data for Name: bitacora; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.bitacora (id_bitacora, accion, persona, fecha_hora, tipo_bitacora) FROM stdin;
\.


--
-- TOC entry 2994 (class 0 OID 17078)
-- Dependencies: 206
-- Data for Name: detalle_proyecto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.detalle_proyecto (id_det_proyecto, id_proyecto, id_estudiante, puesto_estudiante) FROM stdin;
10	1	1	Vocero
11	2	2	Coordinador
12	1	3	Tesorero
13	2	4	Sub-coordinador
\.


--
-- TOC entry 2996 (class 0 OID 17084)
-- Dependencies: 208
-- Data for Name: docentes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.docentes (id_docente, nombre_docente, email_docente, edad_docente, telefono_docente, dui_docente) FROM stdin;
1	Herbert Cornejo	herbert@ricaldone.edu.sv	2020-08-06	7896-3214	03164898-3
2	Daniel Carranza	daniel_carranza@ricaldone.edu.sv	2020-08-12	7022-2535	02148698-3
3	Raul Bermudez	raul_bermu@ricaldone.edu.sv	2020-08-01	7742-6093	12360458-5
4	Manuel Oliva	manuel_oliva@ricaldone.edu.sv	2020-04-07	7099-9341	78510236-4
5	Elsy Cartagena	elsy_cartagena@ricaldone.edu.sv	2019-10-14	7369-5120	10246358-7
6	Tirza Alas	tirza_alas@ricaldone.edu.sv	2019-05-27	7861-3020	01236487-9
\.


--
-- TOC entry 2998 (class 0 OID 17089)
-- Dependencies: 210
-- Data for Name: equipo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.equipo (id_equipo, nombre_equipo, descripcion_equipo, cantidad, id_estudiante, id_tipo_equipo, estado_equipo, imagen_equipo) FROM stdin;
10	EFE XD	sldjbaskjdasd	70	1	\N	Entrada Confirmada	img.jpg
11	JOJOSD	SDSDS	45	1	\N	Entrada Confirmada	img.jpg
14	Gomitas	Ricas y buenas	30	1	2	Entrada Confirmada	img.jpg
\.


--
-- TOC entry 3000 (class 0 OID 17099)
-- Dependencies: 212
-- Data for Name: especialidad; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.especialidad (id_especialidad, especialidad_estudiante) FROM stdin;
1	Desarrollo de software
3	Diseño Gráfico
6	Electónica
7	Administrativo contable
8	Arquitectura
9	Electromecanica
\.


--
-- TOC entry 3002 (class 0 OID 17104)
-- Dependencies: 214
-- Data for Name: estudiantes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estudiantes (id_estudiante, nombre_estudiante, apellidos_estudiante, email_estudiante, id_seccion, id_especialidad, codigo_estudiante, contrasena_estudiante, intentos_usuario) FROM stdin;
1	Mirna Guadalupe	Portillo Marinez	mirna@gmail.com	1	1	\N	$2y$10$qVLxQb1q7NQRMDZwFcr1SuNGJO9g7mdbofQQVnWjExjOMNW2RjUvq	\N
2	Sergio Alejandro	Mayen Ruano	20180240@gmail.com	1	1	20180240	$2y$10$qVLxQb1q7NQRMDZwFcr1SuNGJO9g7mdbofQQVnWjExjOMNW2RjUvq	\N
9	José	Rodri	20200567@ricaldone.edu.sv	4	7	\N	$2y$10$qVLxQb1q7NQRMDZwFcr1SuNGJO9g7mdbofQQVnWjExjOMNW2RjUvq	\N
8	José Luis	Rodríguez González	20200345@ricaldone.edu.sv	1	8	\N	$2y$10$qVLxQb1q7NQRMDZwFcr1SuNGJO9g7mdbofQQVnWjExjOMNW2RjUvq	3
4	Roxana Elizabeth	Mayén Ruano	20160315@ricaldone.edu.sv	13	8	\N	$2y$10$qVLxQb1q7NQRMDZwFcr1SuNGJO9g7mdbofQQVnWjExjOMNW2RjUvq	3
3	Samuel Enrique	Rivera Martinez	20180316@ricaldone.edu.sv	3	3	\N	$2y$10$qVLxQb1q7NQRMDZwFcr1SuNGJO9g7mdbofQQVnWjExjOMNW2RjUvq	3
11	Pineda	Funez	20160432@ricaldone.edu.sv	1	1	\N	\N	\N
\.


--
-- TOC entry 3004 (class 0 OID 17109)
-- Dependencies: 216
-- Data for Name: evaluacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.evaluacion (id_evaluacion, id_grado, id_evaluador, id_proyecto, observaciones) FROM stdin;
1	1	5	1	Primer lugar
2	7	6	3	Primer lugar
3	3	5	2	Tercer lugar
4	8	4	4	Segundo lugar
7	12	5	\N	Oa
9	9	9	\N	Evaluaciones procesadas
\.


--
-- TOC entry 3006 (class 0 OID 17114)
-- Dependencies: 218
-- Data for Name: evaluadores; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.evaluadores (id_evaluador, nombre_evaluador, apellidos_evaluador, email_evaluador, telefono_evaluador, lugar_procedencia, ocupacion, estado_evaluador) FROM stdin;
5	Pamela Alejandra	Mayén Ruano	pame12@gmail.com	7022-9620	Maria Auxiliadora	Ingeniera	Evaluando
6	Eduardo Ulises	Rosales López	eduardo@gmail.com	7742-0369	ITR	Ingeniero	Nota procesada
4	Roxana Elizabeth	Mayén Ruano	technofast@gmail.com	7896-0235	Maria Auxiliadora	Internacionalista	Convocado
9	Sergio Pineda	Rodríguez	asd.fer@gmail.com	7874-2312	Inrernational INC	Inspactor Industrial	Evaluando
\.


--
-- TOC entry 3008 (class 0 OID 17124)
-- Dependencies: 220
-- Data for Name: grados; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.grados (id_grado, id_aula, id_docente, id_seccion, id_especialidad) FROM stdin;
1	2	1	4	1
3	10	2	3	1
4	9	5	11	7
5	5	3	7	9
6	8	4	1	3
7	6	6	8	8
8	9	4	4	8
9	9	2	1	7
10	9	2	1	7
11	9	2	1	7
12	8	4	4	1
\.


--
-- TOC entry 3010 (class 0 OID 17129)
-- Dependencies: 222
-- Data for Name: imagen_equipo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.imagen_equipo (id_imagen_equipo, id_equipo, imagen_equipo) FROM stdin;
\.


--
-- TOC entry 3012 (class 0 OID 17134)
-- Dependencies: 224
-- Data for Name: niveles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.niveles (id_nivel, nivel_estudiante) FROM stdin;
10	7°
11	8°
12	9°
13	1° año de bachillerato
14	2° año de bachillerato
15	3° año de bachillerato
\.


--
-- TOC entry 3014 (class 0 OID 17139)
-- Dependencies: 226
-- Data for Name: proyectos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.proyectos (id_proyecto, nombre_proyecto, descripcion_proyecto, codigo_proyecto, id_grado) FROM stdin;
1	Tecnico Cientifico	Pasos para el PTC	\N	1
3	Rediseño de restaurante	Cambio de paleta de colores	oiju	5
5	asdsdas	sdsasdsad	\N	4
4	Circuito paralelo	Circuito para un hogar	kjd	6
2	Araña seguidora de luz	Sigue la luz al tocar con el sensor termonuclear	hgf	4
6	PTC KNOWELDGE	Proyecto informativo sociocultural	\N	8
7	PTC EJEMPLO	Proyecto Sociocultural	\N	1
8	Sistema Web	Sistema Web escrito en PHP	\N	9
\.


--
-- TOC entry 3016 (class 0 OID 17144)
-- Dependencies: 228
-- Data for Name: secciones; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.secciones (id_seccion, id_nivel, seccion_estudiante) FROM stdin;
1	11	A
3	15	A-2
4	14	A-1
5	14	A-3
6	14	A-4
7	13	B-4
8	13	B-3
9	10	C
10	10	D
11	12	B
13	10	A
\.


--
-- TOC entry 3018 (class 0 OID 17149)
-- Dependencies: 230
-- Data for Name: tipo_equipo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tipo_equipo (id_tipo_equipo, tipo_equipo) FROM stdin;
2	Alimento
4	Electrónico
\.


--
-- TOC entry 3020 (class 0 OID 17154)
-- Dependencies: 232
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuarios (id_usuario, nombre_usuario, email_usuario, contrasena_usuario, estado_usuario, foto_usuario, intentos_usuario) FROM stdin;
29	José Luis Rodríguez González	20180359@ricaldone.edu.sv	$2y$10$bVf5d7FuwVKkh8O67BZAJegVjiBdK9qOjqfQVHU0jbvgOW/lWJ0k2	Activo	5fb2b7f8effba.png	\N
\.


--
-- TOC entry 3043 (class 0 OID 0)
-- Dependencies: 203
-- Name: aulas_id_aula_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.aulas_id_aula_seq', 12, true);


--
-- TOC entry 3044 (class 0 OID 0)
-- Dependencies: 205
-- Name: bitacora_id_bitacora_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.bitacora_id_bitacora_seq', 1, false);


--
-- TOC entry 3045 (class 0 OID 0)
-- Dependencies: 207
-- Name: detalle_proyecto_id_det_proyecto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.detalle_proyecto_id_det_proyecto_seq', 13, true);


--
-- TOC entry 3046 (class 0 OID 0)
-- Dependencies: 209
-- Name: docentes_id_docente_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.docentes_id_docente_seq', 8, true);


--
-- TOC entry 3047 (class 0 OID 0)
-- Dependencies: 211
-- Name: equipo_id_equipo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.equipo_id_equipo_seq', 14, true);


--
-- TOC entry 3048 (class 0 OID 0)
-- Dependencies: 213
-- Name: especialidad_id_especialidad_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.especialidad_id_especialidad_seq', 10, true);


--
-- TOC entry 3049 (class 0 OID 0)
-- Dependencies: 215
-- Name: estudiantes_id_estudiante_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.estudiantes_id_estudiante_seq', 11, true);


--
-- TOC entry 3050 (class 0 OID 0)
-- Dependencies: 217
-- Name: evaluacion_id_evaluacion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.evaluacion_id_evaluacion_seq', 9, true);


--
-- TOC entry 3051 (class 0 OID 0)
-- Dependencies: 219
-- Name: evaluadores_id_evaluador_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.evaluadores_id_evaluador_seq', 9, true);


--
-- TOC entry 3052 (class 0 OID 0)
-- Dependencies: 221
-- Name: grados_id_grado_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.grados_id_grado_seq', 14, true);


--
-- TOC entry 3053 (class 0 OID 0)
-- Dependencies: 223
-- Name: imagen_equipo_id_imagen_equipo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.imagen_equipo_id_imagen_equipo_seq', 1, false);


--
-- TOC entry 3054 (class 0 OID 0)
-- Dependencies: 225
-- Name: niveles_id_nivel_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.niveles_id_nivel_seq', 19, true);


--
-- TOC entry 3055 (class 0 OID 0)
-- Dependencies: 227
-- Name: proyectos_id_proyecto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.proyectos_id_proyecto_seq', 8, true);


--
-- TOC entry 3056 (class 0 OID 0)
-- Dependencies: 229
-- Name: secciones_id_seccion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.secciones_id_seccion_seq', 15, true);


--
-- TOC entry 3057 (class 0 OID 0)
-- Dependencies: 231
-- Name: tipo_equipo_id_tipo_equipo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipo_equipo_id_tipo_equipo_seq', 7, true);


--
-- TOC entry 3058 (class 0 OID 0)
-- Dependencies: 233
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuarios_id_usuario_seq', 30, true);


--
-- TOC entry 2803 (class 2606 OID 17178)
-- Name: aulas aulas_nombre_aula_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aulas
    ADD CONSTRAINT aulas_nombre_aula_key UNIQUE (nombre_aula);


--
-- TOC entry 2805 (class 2606 OID 17180)
-- Name: aulas aulas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aulas
    ADD CONSTRAINT aulas_pkey PRIMARY KEY (id_aula);


--
-- TOC entry 2807 (class 2606 OID 17182)
-- Name: bitacora bitacora_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bitacora
    ADD CONSTRAINT bitacora_pkey PRIMARY KEY (id_bitacora);


--
-- TOC entry 2809 (class 2606 OID 17184)
-- Name: detalle_proyecto detalle_proyecto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.detalle_proyecto
    ADD CONSTRAINT detalle_proyecto_pkey PRIMARY KEY (id_det_proyecto);


--
-- TOC entry 2811 (class 2606 OID 17186)
-- Name: docentes docentes_dui_docente_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.docentes
    ADD CONSTRAINT docentes_dui_docente_key UNIQUE (dui_docente);


--
-- TOC entry 2813 (class 2606 OID 17188)
-- Name: docentes docentes_email_docente_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.docentes
    ADD CONSTRAINT docentes_email_docente_key UNIQUE (email_docente);


--
-- TOC entry 2815 (class 2606 OID 17190)
-- Name: docentes docentes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.docentes
    ADD CONSTRAINT docentes_pkey PRIMARY KEY (id_docente);


--
-- TOC entry 2817 (class 2606 OID 17192)
-- Name: equipo equipo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.equipo
    ADD CONSTRAINT equipo_pkey PRIMARY KEY (id_equipo);


--
-- TOC entry 2819 (class 2606 OID 17194)
-- Name: especialidad especialidad_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.especialidad
    ADD CONSTRAINT especialidad_pkey PRIMARY KEY (id_especialidad);


--
-- TOC entry 2821 (class 2606 OID 17196)
-- Name: estudiantes estudiantes_email_estudiante_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estudiantes
    ADD CONSTRAINT estudiantes_email_estudiante_key UNIQUE (email_estudiante);


--
-- TOC entry 2823 (class 2606 OID 17198)
-- Name: estudiantes estudiantes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estudiantes
    ADD CONSTRAINT estudiantes_pkey PRIMARY KEY (id_estudiante);


--
-- TOC entry 2825 (class 2606 OID 17200)
-- Name: evaluacion evaluacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evaluacion
    ADD CONSTRAINT evaluacion_pkey PRIMARY KEY (id_evaluacion);


--
-- TOC entry 2827 (class 2606 OID 17202)
-- Name: evaluadores evaluadores_email_evaluador_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evaluadores
    ADD CONSTRAINT evaluadores_email_evaluador_key UNIQUE (email_evaluador);


--
-- TOC entry 2829 (class 2606 OID 17204)
-- Name: evaluadores evaluadores_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evaluadores
    ADD CONSTRAINT evaluadores_pkey PRIMARY KEY (id_evaluador);


--
-- TOC entry 2831 (class 2606 OID 17206)
-- Name: grados grados_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.grados
    ADD CONSTRAINT grados_pkey PRIMARY KEY (id_grado);


--
-- TOC entry 2833 (class 2606 OID 17208)
-- Name: imagen_equipo imagen_equipo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.imagen_equipo
    ADD CONSTRAINT imagen_equipo_pkey PRIMARY KEY (id_imagen_equipo);


--
-- TOC entry 2835 (class 2606 OID 17210)
-- Name: niveles niveles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.niveles
    ADD CONSTRAINT niveles_pkey PRIMARY KEY (id_nivel);


--
-- TOC entry 2837 (class 2606 OID 17212)
-- Name: proyectos proyectos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.proyectos
    ADD CONSTRAINT proyectos_pkey PRIMARY KEY (id_proyecto);


--
-- TOC entry 2839 (class 2606 OID 17214)
-- Name: secciones secciones_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.secciones
    ADD CONSTRAINT secciones_pkey PRIMARY KEY (id_seccion);


--
-- TOC entry 2841 (class 2606 OID 17216)
-- Name: tipo_equipo tipo_equipo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo_equipo
    ADD CONSTRAINT tipo_equipo_pkey PRIMARY KEY (id_tipo_equipo);


--
-- TOC entry 2843 (class 2606 OID 17218)
-- Name: tipo_equipo tipo_equipo_tipo_equipo_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo_equipo
    ADD CONSTRAINT tipo_equipo_tipo_equipo_key UNIQUE (tipo_equipo);


--
-- TOC entry 2845 (class 2606 OID 17220)
-- Name: usuarios usuarios_email_usuario_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_email_usuario_key UNIQUE (email_usuario);


--
-- TOC entry 2847 (class 2606 OID 17222)
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id_usuario);


--
-- TOC entry 2848 (class 2606 OID 17223)
-- Name: detalle_proyecto detalle_proyecto_id_estudiante_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.detalle_proyecto
    ADD CONSTRAINT detalle_proyecto_id_estudiante_fkey FOREIGN KEY (id_estudiante) REFERENCES public.estudiantes(id_estudiante);


--
-- TOC entry 2849 (class 2606 OID 17228)
-- Name: detalle_proyecto detalle_proyecto_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.detalle_proyecto
    ADD CONSTRAINT detalle_proyecto_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES public.proyectos(id_proyecto);


--
-- TOC entry 2850 (class 2606 OID 17233)
-- Name: equipo equipo_id_estudiante_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.equipo
    ADD CONSTRAINT equipo_id_estudiante_fkey FOREIGN KEY (id_estudiante) REFERENCES public.estudiantes(id_estudiante);


--
-- TOC entry 2851 (class 2606 OID 17238)
-- Name: equipo equipo_id_tipo_equipo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.equipo
    ADD CONSTRAINT equipo_id_tipo_equipo_fkey FOREIGN KEY (id_tipo_equipo) REFERENCES public.tipo_equipo(id_tipo_equipo);


--
-- TOC entry 2852 (class 2606 OID 17243)
-- Name: estudiantes estudiantes_id_especialidad_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estudiantes
    ADD CONSTRAINT estudiantes_id_especialidad_fkey FOREIGN KEY (id_especialidad) REFERENCES public.especialidad(id_especialidad);


--
-- TOC entry 2853 (class 2606 OID 17248)
-- Name: estudiantes estudiantes_id_seccion_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estudiantes
    ADD CONSTRAINT estudiantes_id_seccion_fkey FOREIGN KEY (id_seccion) REFERENCES public.secciones(id_seccion);


--
-- TOC entry 2854 (class 2606 OID 17253)
-- Name: evaluacion evaluacion_id_evaluador_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evaluacion
    ADD CONSTRAINT evaluacion_id_evaluador_fkey FOREIGN KEY (id_evaluador) REFERENCES public.evaluadores(id_evaluador);


--
-- TOC entry 2855 (class 2606 OID 17258)
-- Name: evaluacion evaluacion_id_grado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evaluacion
    ADD CONSTRAINT evaluacion_id_grado_fkey FOREIGN KEY (id_grado) REFERENCES public.grados(id_grado);


--
-- TOC entry 2856 (class 2606 OID 17263)
-- Name: evaluacion evaluacion_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evaluacion
    ADD CONSTRAINT evaluacion_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES public.proyectos(id_proyecto);


--
-- TOC entry 2857 (class 2606 OID 17268)
-- Name: grados grados_id_aula_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.grados
    ADD CONSTRAINT grados_id_aula_fkey FOREIGN KEY (id_aula) REFERENCES public.aulas(id_aula);


--
-- TOC entry 2858 (class 2606 OID 17273)
-- Name: grados grados_id_docente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.grados
    ADD CONSTRAINT grados_id_docente_fkey FOREIGN KEY (id_docente) REFERENCES public.docentes(id_docente);


--
-- TOC entry 2859 (class 2606 OID 17278)
-- Name: grados grados_id_especialidad_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.grados
    ADD CONSTRAINT grados_id_especialidad_fkey FOREIGN KEY (id_especialidad) REFERENCES public.especialidad(id_especialidad);


--
-- TOC entry 2860 (class 2606 OID 17283)
-- Name: grados grados_id_seccion_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.grados
    ADD CONSTRAINT grados_id_seccion_fkey FOREIGN KEY (id_seccion) REFERENCES public.secciones(id_seccion);


--
-- TOC entry 2861 (class 2606 OID 17288)
-- Name: imagen_equipo imagen_equipo_id_equipo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.imagen_equipo
    ADD CONSTRAINT imagen_equipo_id_equipo_fkey FOREIGN KEY (id_equipo) REFERENCES public.equipo(id_equipo);


--
-- TOC entry 2862 (class 2606 OID 17293)
-- Name: proyectos proyectos_id_grado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.proyectos
    ADD CONSTRAINT proyectos_id_grado_fkey FOREIGN KEY (id_grado) REFERENCES public.grados(id_grado);


--
-- TOC entry 2863 (class 2606 OID 17298)
-- Name: secciones secciones_id_nivel_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.secciones
    ADD CONSTRAINT secciones_id_nivel_fkey FOREIGN KEY (id_nivel) REFERENCES public.niveles(id_nivel);


-- Completed on 2020-11-16 12:29:16

--
-- PostgreSQL database dump complete
--

