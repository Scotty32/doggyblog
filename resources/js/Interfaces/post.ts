import { IUser } from "./user";

export interface IPost {
    id: number,
    title: string,
    content: string,
    author: IUser,
    posted_at: string,
    created_at: string,
    updated_at: string,
    like_count: number
}
