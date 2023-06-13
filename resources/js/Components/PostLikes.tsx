import { IPost } from '@/Interfaces/post';
import React from 'react';

export interface IPostLikesProps {
    id: number
    likes_count: number,
}

export interface ILikesComponentProps {
    Componant: React.Component<{
        id: number
        likes_count: number,
    }>
    on_like: () => void
}

export const PostLikes = ({id, likes_count}: IPostLikesProps) => {

    <div>
        {Fa}
    </div>
}