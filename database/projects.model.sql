CREATE TABLE IF NOT EXISTS public."projects" (
    id uuid NOT NULL PRIMARY KEY DEFAULT gen_random_uuid(),
    name varchar(225) NOT NULL,
    description text,
    start_date date,
    end_date date,
    status varchar(100) DEFAULT 'planned',
    created_at timestamptz DEFAULT now(),
    updated_at timestamptz DEFAULT now()
);