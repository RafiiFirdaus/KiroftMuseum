BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "cache" (
	"key"	varchar NOT NULL,
	"value"	text NOT NULL,
	"expiration"	integer NOT NULL,
	PRIMARY KEY("key")
);
CREATE TABLE IF NOT EXISTS "cache_locks" (
	"key"	varchar NOT NULL,
	"owner"	varchar NOT NULL,
	"expiration"	integer NOT NULL,
	PRIMARY KEY("key")
);
CREATE TABLE IF NOT EXISTS "failed_jobs" (
	"id"	integer NOT NULL,
	"uuid"	varchar NOT NULL,
	"connection"	text NOT NULL,
	"queue"	text NOT NULL,
	"payload"	text NOT NULL,
	"exception"	text NOT NULL,
	"failed_at"	datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "job_batches" (
	"id"	varchar NOT NULL,
	"name"	varchar NOT NULL,
	"total_jobs"	integer NOT NULL,
	"pending_jobs"	integer NOT NULL,
	"failed_jobs"	integer NOT NULL,
	"failed_job_ids"	text NOT NULL,
	"options"	text,
	"cancelled_at"	integer,
	"created_at"	integer NOT NULL,
	"finished_at"	integer,
	PRIMARY KEY("id")
);
CREATE TABLE IF NOT EXISTS "jobs" (
	"id"	integer NOT NULL,
	"queue"	varchar NOT NULL,
	"payload"	text NOT NULL,
	"attempts"	integer NOT NULL,
	"reserved_at"	integer,
	"available_at"	integer NOT NULL,
	"created_at"	integer NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "migrations" (
	"id"	integer NOT NULL,
	"migration"	varchar NOT NULL,
	"batch"	integer NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "password_reset_tokens" (
	"email"	varchar NOT NULL,
	"token"	varchar NOT NULL,
	"created_at"	datetime,
	PRIMARY KEY("email")
);
CREATE TABLE IF NOT EXISTS "personal_access_tokens" (
	"id"	integer NOT NULL,
	"tokenable_type"	varchar NOT NULL,
	"tokenable_id"	integer NOT NULL,
	"name"	text NOT NULL,
	"token"	varchar NOT NULL,
	"abilities"	text,
	"last_used_at"	datetime,
	"expires_at"	datetime,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "purchases" (
	"id"	integer NOT NULL,
	"user_id"	integer NOT NULL,
	"ticket_id"	integer NOT NULL,
	"purchase_date"	datetime NOT NULL DEFAULT '2025-07-12 23:34:33',
	"visit_date"	date NOT NULL,
	"quantity"	integer NOT NULL,
	"total_price"	numeric NOT NULL,
	"status"	varchar NOT NULL DEFAULT 'pending',
	"created_at"	datetime,
	"updated_at"	datetime,
	"museum_name"	varchar,
	"ticket_type"	varchar,
	"time_slot"	varchar,
	"full_name"	varchar,
	"email"	varchar,
	"phone"	varchar,
	"payment_method"	varchar,
	"student_id_path"	varchar,
	PRIMARY KEY("id" AUTOINCREMENT),
	FOREIGN KEY("ticket_id") REFERENCES "tickets"("id") on delete cascade,
	FOREIGN KEY("user_id") REFERENCES "users"("id") on delete cascade
);
CREATE TABLE IF NOT EXISTS "sessions" (
	"id"	varchar NOT NULL,
	"user_id"	integer,
	"ip_address"	varchar,
	"user_agent"	text,
	"payload"	text NOT NULL,
	"last_activity"	integer NOT NULL,
	PRIMARY KEY("id")
);
CREATE TABLE IF NOT EXISTS "tickets" (
	"id"	integer NOT NULL,
	"ticket_name"	varchar NOT NULL,
	"description"	text,
	"price"	numeric NOT NULL,
	"available_quantity"	integer NOT NULL DEFAULT '-1',
	"is_active"	tinyint(1) NOT NULL DEFAULT '1',
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "users" (
	"id"	integer NOT NULL,
	"name"	varchar NOT NULL,
	"email"	varchar NOT NULL,
	"email_verified_at"	datetime,
	"password"	varchar NOT NULL,
	"remember_token"	varchar,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
INSERT INTO "migrations" VALUES (8,'0001_01_01_000000_create_users_table',1);
INSERT INTO "migrations" VALUES (9,'0001_01_01_000001_create_cache_table',1);
INSERT INTO "migrations" VALUES (10,'0001_01_01_000002_create_jobs_table',1);
INSERT INTO "migrations" VALUES (11,'2025_07_12_083353_create_tickets_table',1);
INSERT INTO "migrations" VALUES (12,'2025_07_12_083403_create_purchases_table',1);
INSERT INTO "migrations" VALUES (13,'2025_07_12_093056_create_personal_access_tokens_table',1);
INSERT INTO "migrations" VALUES (14,'2025_07_12_151942_add_booking_fields_to_purchases_table',1);
INSERT INTO "personal_access_tokens" VALUES (11,'App\Models\User',4,'auth_token','e58ff4292fa96db185b732cac815c007dbe5a68d406e7f88fad158d0c9a3ae96','["*"]',NULL,NULL,'2025-07-14 01:47:41','2025-07-14 01:47:41');
INSERT INTO "personal_access_tokens" VALUES (18,'App\Models\User',4,'auth_token','c96a349f1adeef6d56d65282472b59e017d2944ac6f063a3eb42d69049864e31','["*"]','2025-07-14 13:45:04',NULL,'2025-07-14 13:43:18','2025-07-14 13:45:04');
INSERT INTO "purchases" VALUES (7,4,2,'2025-07-12 23:34:33','2025-07-21 17:00:00',1,10000,'completed','2025-07-13 13:49:52','2025-07-13 13:49:52','Museum 10 Nopember','student','09:00-10:50','caca','caca@elek.com','0987000','gopay',NULL);
INSERT INTO "purchases" VALUES (8,5,2,'2025-07-12 23:34:33','2025-07-30 17:00:00',1,10000,'completed','2025-07-14 09:27:54','2025-07-14 09:27:54','Museum 10 Nopember','student','15:00-16:30','caca','caca@elek.com','08900000','dana',NULL);
INSERT INTO "purchases" VALUES (9,4,2,'2025-07-12 23:34:33','2025-07-26 17:00:00',1,10000,'completed','2025-07-14 13:44:17','2025-07-14 13:44:17','Museum 10 Nopember','student','09:00-10:50','caca','caca@elek.com','08900000','gopay',NULL);
INSERT INTO "sessions" VALUES ('PLBSJg103FNRiAuHVayz1AQz1hRSEV3BWTK803T7',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMkRnT3l3c2pQdDRidXhqN1JZU0s3Y2c2UVFIbHh2dEVIRFBjbTE2ZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyLWRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1752485285);
INSERT INTO "sessions" VALUES ('Fgebr1BbN45nX33G0bosiJFD5awMplRGcfT73RSa',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNFFGbWxlU3psWGRrazRtV0x2ek1kdFRad1hWTmYyeEdnTzZiR2hpTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9teS10aWNrZXRzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1752500703);
INSERT INTO "tickets" VALUES (1,'General Admission','General admission ticket',15000,-1,1,NULL,NULL);
INSERT INTO "tickets" VALUES (2,'Student Admission','Student admission ticket',10000,-1,1,NULL,NULL);
INSERT INTO "tickets" VALUES (3,'Tiket Dewasa','Akses penuh ke semua pameran museum untuk 1 orang dewasa.',50000,-1,1,'2025-07-13 02:04:54','2025-07-13 02:04:54');
INSERT INTO "tickets" VALUES (4,'Tiket Anak (5-12 tahun)','Akses penuh ke semua pameran museum untuk 1 anak usia 5-12 tahun.',25000,-1,1,'2025-07-13 02:04:54','2025-07-13 02:04:54');
INSERT INTO "tickets" VALUES (5,'Tiket Pelajar','Akses penuh ke semua pameran museum untuk 1 pelajar (memerlukan ID pelajar).',35000,-1,1,'2025-07-13 02:04:54','2025-07-13 02:04:54');
INSERT INTO "tickets" VALUES (6,'Paket Keluarga (2 Dewasa + 2 Anak)','Akses penuh untuk 2 dewasa dan 2 anak.',120000,-1,1,'2025-07-13 02:04:54','2025-07-13 02:04:54');
INSERT INTO "users" VALUES (4,'Kiroft','kiroft@here.com',NULL,'$2y$12$9EB0ZtY/oNtSPvVvyrWkYOYrS/NhfhGhdAzOKP69ZpDVHKqTRPFmO',NULL,'2025-07-13 13:48:06','2025-07-14 09:19:24');
INSERT INTO "users" VALUES (5,'testing','testing@0.com',NULL,'$2y$12$BkVoZuXqeIWQzYBAlfp...Ihv31gjqyYok8Kw8yBL75VipVSG37/m',NULL,'2025-07-14 09:26:54','2025-07-14 09:26:54');
INSERT INTO "users" VALUES (6,'caca','caca@elek.com',NULL,'$2y$12$mbQWaAmKvX/FIcV0/ACds.CIp.Ry.nhQN.EpaC1n7oEQ.iT8IRZF.',NULL,'2025-07-14 12:53:24','2025-07-14 12:53:24');
CREATE UNIQUE INDEX IF NOT EXISTS "failed_jobs_uuid_unique" ON "failed_jobs" (
	"uuid"
);
CREATE INDEX IF NOT EXISTS "jobs_queue_index" ON "jobs" (
	"queue"
);
CREATE UNIQUE INDEX IF NOT EXISTS "personal_access_tokens_token_unique" ON "personal_access_tokens" (
	"token"
);
CREATE INDEX IF NOT EXISTS "personal_access_tokens_tokenable_type_tokenable_id_index" ON "personal_access_tokens" (
	"tokenable_type",
	"tokenable_id"
);
CREATE INDEX IF NOT EXISTS "sessions_last_activity_index" ON "sessions" (
	"last_activity"
);
CREATE INDEX IF NOT EXISTS "sessions_user_id_index" ON "sessions" (
	"user_id"
);
CREATE UNIQUE INDEX IF NOT EXISTS "users_email_unique" ON "users" (
	"email"
);
COMMIT;
