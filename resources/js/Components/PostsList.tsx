import { useAppSelector } from '@/Hooks/store'
import React from 'react'
import { PostCard } from './PostCard'

export const PostsList = () => {
    const {posts} = useAppSelector((state) => state.posts)
    console.log(posts);


    return (
        <section id='posts-section'>
            {posts?.map((post, index) => <PostCard post={post} key={index}/>)}
        </section>
    )
}
