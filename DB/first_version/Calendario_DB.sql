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
  "course_year" varchar
);

CREATE TABLE "academic_year" (
  "id" SERIAL PRIMARY KEY,
  "year_name" varchar,
  "evaluation_seasons" varchar
);

CREATE TABLE "calendar" (
  "id" SERIAL PRIMARY KEY,
  "calendar_name" varchar,
  "academic_year" varchar,
  "evaluation_season" varchar,
  "course" varchar,
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
  "slot_id" SERIAL PRIMARY KEY,
  "time_slot" varchar
);

CREATE TABLE "evaluation_slot" (
  "id" SERIAL PRIMARY KEY,
  "day" date,
  "subject" varchar,
  "associated_professor" varchar,
  "observing_professor" varchar,
  "classroom" varchar,
  "time_slot" varchar
);

ALTER TABLE "subject" ADD FOREIGN KEY ("associated_professor") REFERENCES "professors" ("id");

ALTER TABLE "courses" ADD FOREIGN KEY ("name") REFERENCES "subject" ("associated_course");

ALTER TABLE "subject" ADD FOREIGN KEY ("name") REFERENCES "evaluation_slot" ("subject");

ALTER TABLE "evaluation_slot" ADD FOREIGN KEY ("day") REFERENCES "calendar_day" ("evaluation_day");

ALTER TABLE "evaluation_slot" ADD FOREIGN KEY ("associated_professor") REFERENCES "professors" ("name");

ALTER TABLE "evaluation_slot" ADD FOREIGN KEY ("observing_professor") REFERENCES "professors" ("name");

ALTER TABLE "evaluation_slot" ADD FOREIGN KEY ("classroom") REFERENCES "classrooms" ("classroom");

ALTER TABLE "evaluation_slot" ADD FOREIGN KEY ("time_slot") REFERENCES "time_slot" ("time_slot");

ALTER TABLE "courses" ADD FOREIGN KEY ("name") REFERENCES "calendar" ("course");

ALTER TABLE "academic_year" ADD FOREIGN KEY ("year_name") REFERENCES "calendar" ("academic_year");

ALTER TABLE "calendar" ADD FOREIGN KEY ("id") REFERENCES "calendar_day" ("calendar_id");
