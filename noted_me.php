-- Table: workplaze.person

-- DROP TABLE IF EXISTS workplaze.person;

CREATE TABLE IF NOT EXISTS workplaze.person
(
    local_id integer NOT NULL DEFAULT nextval('workplaze.person_local_id_seq'::regclass),
    global_id text COLLATE pg_catalog."default",
    emp_id text COLLATE pg_catalog."default",
    first_name text COLLATE pg_catalog."default",
    mid_name text COLLATE pg_catalog."default",
    last_name text COLLATE pg_catalog."default",
    birth_name text COLLATE pg_catalog."default",
    pob text COLLATE pg_catalog."default",
    dob date,
    gender text COLLATE pg_catalog."default",
    maiden text COLLATE pg_catalog."default",
    created_at timestamp without time zone NOT NULL DEFAULT now(),
    person_company integer
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS workplaze.person
    OWNER to postgres;




    -- Table: workplaze.jabatan

-- DROP TABLE IF EXISTS workplaze.jabatan;

CREATE TABLE IF NOT EXISTS workplaze.jabatan
(
    jab_id integer NOT NULL DEFAULT nextval('workplaze.jabatan_jab_id_seq'::regclass),
    id text COLLATE pg_catalog."default",
    jab_code text COLLATE pg_catalog."default",
    jab_label text COLLATE pg_catalog."default",
    jab_remark text COLLATE pg_catalog."default",
    jab_company text COLLATE pg_catalog."default",
    dept_id text COLLATE pg_catalog."default",
    created_at timestamp without time zone NOT NULL DEFAULT now()
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS workplaze.jabatan
    OWNER to postgres;


    -- Table: workplaze.grade

-- DROP TABLE IF EXISTS workplaze.grade;

CREATE TABLE IF NOT EXISTS workplaze.grade
(
    grade_id integer NOT NULL DEFAULT nextval('workplaze.grade_grade_id_seq'::regclass),
    id text COLLATE pg_catalog."default",
    grade_code text COLLATE pg_catalog."default",
    grade_rank text COLLATE pg_catalog."default",
    grade_remark text COLLATE pg_catalog."default",
    grade_company text COLLATE pg_catalog."default",
    created_at timestamp without time zone NOT NULL DEFAULT now()
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS workplaze.grade
    OWNER to postgres;

    -- Table: workplaze.dept

-- DROP TABLE IF EXISTS workplaze.dept;

CREATE TABLE IF NOT EXISTS workplaze.dept
(
    dept_id integer NOT NULL DEFAULT nextval('workplaze.dept_dept_id_seq'::regclass),
    id text COLLATE pg_catalog."default",
    code text COLLATE pg_catalog."default",
    label text COLLATE pg_catalog."default",
    remark text COLLATE pg_catalog."default",
    company text COLLATE pg_catalog."default",
    created_at timestamp without time zone NOT NULL DEFAULT now()
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS workplaze.dept
    OWNER to postgres;


    -- Table: workplaze.costcenter

-- DROP TABLE IF EXISTS workplaze.costcenter;

CREATE TABLE IF NOT EXISTS workplaze.costcenter
(
    cost_id integer NOT NULL DEFAULT nextval('workplaze.costcenter_cost_id_seq'::regclass),
    id text COLLATE pg_catalog."default",
    cost_code text COLLATE pg_catalog."default",
    cost_label text COLLATE pg_catalog."default",
    cost_company text COLLATE pg_catalog."default",
    created_at timestamp without time zone NOT NULL DEFAULT now()
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS workplaze.costcenter
    OWNER to postgres;
