CREATE TABLE "users" (
  "id" SERIAL PRIMARY KEY,
  "user_email" varchar,
  "password" varchar,
  "created_at" timestamp
);

CREATE TABLE "professors" (
  "id" SERIAL PRIMARY KEY,
  "name" varchar,
  "email" varchar,
  "availability" varchar
);

CREATE TABLE "courses" (
  "id" SERIAL PRIMARY KEY,
  "name" varchar,
  "course_id" varchar,
  "course_years" int
);

CREATE TABLE "classrooms" (
  "id" SERIAL PRIMARY KEY,
  "classroom" varchar,
  "capacity" int,
  "type" varchar
);

CREATE TABLE "subject" (
  "id" SERIAL PRIMARY KEY,
  "name" varchar,
  "subject_id" varchar,
  "semester" varchar,
  "associated_professor" varchar,
  "associated_course" varchar,
  "course_year" int
);

CREATE TABLE "academic_year" (
  "id" SERIAL PRIMARY KEY,
  "year_name" varchar,
  "evaluation_seasons" varchar
);

CREATE TABLE "calendar" (
  "id" SERIAL PRIMARY KEY,
  "calendar_name" varchar,
  "academic_year" integer,
  "evaluation_season" varchar,
  "course" integer,
  "course_year" int,
  "start_date" date,
  "end_date" date
);

CREATE TABLE "calendar_day" (
  "id" SERIAL PRIMARY KEY,
  "calendar_id" int,
  "evaluation_day" date
);

CREATE TABLE "time_slot" (
  "id" SERIAL PRIMARY KEY,
  "time_slot" varchar
);

CREATE TABLE "evaluation_slot" (
  "id" SERIAL PRIMARY KEY,
  "day" integer,
  "subject" integer,
  "associated_professor" integer,
  "observing_professor" integer,
  "classroom" integer,
  "time_slot" integer
);

CREATE TABLE "historic_calendar" (
  "id" SERIAL PRIMARY KEY,
  "calendar_name" varchar,
  "academic_year" varchar,
  "evaluation_season" varchar,
  "course" varchar,
  "course_year" int,
  "start_date" date,
  "end_date" date
);

CREATE TABLE "historic_evaluation_slot" (
  "id" SERIAL PRIMARY KEY,
  "day" date,
  "subject" varchar,
  "associated_professor" varchar,
  "observing_professor" varchar,
  "classroom" varchar,
  "time_slot" varchar,
  "historic_calendar_id" int
);

ALTER TABLE "historic_evaluation_slot" ADD FOREIGN KEY ("historic_calendar_id") REFERENCES "historic_calendar" ("id");

ALTER TABLE "subject" ADD FOREIGN KEY ("associated_professor") REFERENCES "professors" ("id");

ALTER TABLE "courses" ADD FOREIGN KEY ("name") REFERENCES "subject" ("associated_course");

ALTER TABLE "subject" ADD FOREIGN KEY ("name") REFERENCES "evaluation_slot" ("subject");

ALTER TABLE "evaluation_slot" ADD FOREIGN KEY ("day") REFERENCES "calendar_day" ("id");

ALTER TABLE "evaluation_slot" ADD FOREIGN KEY ("associated_professor") REFERENCES "professors" ("id");

ALTER TABLE "evaluation_slot" ADD FOREIGN KEY ("observing_professor") REFERENCES "professors" ("id");

ALTER TABLE "evaluation_slot" ADD FOREIGN KEY ("classroom") REFERENCES "classrooms" ("id");

ALTER TABLE "evaluation_slot" ADD FOREIGN KEY ("time_slot") REFERENCES "time_slot" ("id");

ALTER TABLE "courses" ADD FOREIGN KEY ("id") REFERENCES "calendar" ("course");

ALTER TABLE "academic_year" ADD FOREIGN KEY ("id") REFERENCES "calendar" ("academic_year");

ALTER TABLE "calendar_day" ADD FOREIGN KEY ("calendar_id") REFERENCES "calendar" ("id");
