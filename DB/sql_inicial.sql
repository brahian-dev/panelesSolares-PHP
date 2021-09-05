
CREATE DATABASE silogdemodb5
  WITH OWNER = postgres
       ENCODING = 'UTF8'
       TABLESPACE = pg_default
       LC_COLLATE = 'en_US.UTF-8'
       LC_CTYPE = 'en_US.UTF-8'
       CONNECTION LIMIT = -1;

--DROP TABLE public.tb_impresora;

CREATE TABLE public.tb_impresora
(
  id_impresora  serial,
  nombre character varying(50) NOT NULL,
  observacion text NOT NULL,
  id_usuario_cre integer NOT NULL,
  fec_cre timestamp without time zone DEFAULT (substr((now())::text, 0, 20))::timestamp without time zone,
  id_usuario_mod integer,
  fec_mod timestamp without time zone,
  cod_impresora character varying(10) NOT NULL,
  CONSTRAINT pk_tb_impresora PRIMARY KEY (id_impresora),
  CONSTRAINT uq_tb_impresora_nombre UNIQUE (nombre)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.tb_impresora
  OWNER TO postgres;
GRANT ALL ON TABLE public.tb_impresora TO postgres;
