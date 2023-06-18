import { z } from 'zod';

export const UserSchema = z.object({
    id: z.number(),
    name: z.string(),
    email: z.string().email(),
    email_verified_at: z.date(),
    created_at: z.date(),
    updated_at: z.date(),
    phonenumber: z.string(),
    admin: z.boolean().default(false),
    isSignaled: z.boolean().default(false),
    last_activity: z.date(),
    isBlocked: z.boolean().default(false),
})
