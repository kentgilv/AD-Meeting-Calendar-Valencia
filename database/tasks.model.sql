CREATE TABLE IF NOT EXISTS public."tasks" (
    id uuid NOT NULL PRIMARY KEY DEFAULT gen_random_uuid(),
    project_id uuid NOT NULL REFERENCES public."projects"(id) ON DELETE CASCADE,
    assigned_to uuid REFERENCES public."users"(id) ON DELETE SET NULL,
    title varchar(255) NOT NULL,
    description text,
    status varchar(100) DEFAULT 'pending',
    due_date date,
    created_at timestamptz DEFAULT now(),
    updated_at timestamptz DEFAULT now()
);