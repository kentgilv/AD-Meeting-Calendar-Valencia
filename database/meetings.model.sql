CREATE TABLE IF NOT EXISTS public."meetings" (
    id uuid NOT NULL PRIMARY KEY DEFAULT gen_random_uuid(),
    name varchar(225) NOT NULL,
    description text,
    meeting_date date,
    location VARCHAR(255),
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    organizer_id varchar(225),
    created_at timestamptz DEFAULT now()
);