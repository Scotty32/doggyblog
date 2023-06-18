import { z } from 'zod';
import { UserSchema } from './user'
import { zodToTs, createTypeAlias } from 'zod-to-ts';

export const PostSchema = z.object({
    id: z.number(),
    title: z.string().min(2),
    content: z.string().min(2),
    author: UserSchema,
    posted_at: z.date(),
    created_at: z.date(),
    updated_at: z.date(),
})

