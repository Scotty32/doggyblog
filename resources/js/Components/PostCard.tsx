import { IPost } from '@/Interfaces/post'
import { truncateString } from '@/utils'
import { Link } from '@inertiajs/inertia-react'
import React from 'react'
import { PostLikes } from './PostLikes'

export interface IPostCardProps {
    post: IPost
}

export const PostCard: React.FC<IPostCardProps> = ({post}) => {
    return (
        <div className="card card-side bg-base-100 bg-opacity-60 shadow-xl">

            <figure><img src="/images/stock/photo-1635805737707-575885ab0820.jpg" alt="Movie"/></figure>
            <div className="card-body">
                <h2 className="card-title">
                    {post.title}
                </h2>

                <p>
                    {truncateString(post.content, 500)}<Link href={route('post.show', {id: post.id})}>...lire la suite</Link>
                </p>
                <div className="card-actions justify-end">
                    <button className="btn btn-primary">Watch</button>
                </div>
                <PostLikes
                    id={post.id}
                    likes_count={post.like_count}
                />
            </div>
        </div>

    )
}
