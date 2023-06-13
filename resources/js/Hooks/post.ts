import { IPost } from "@/Interfaces/post";
import React, { useEffect } from "react";
import { useAppDispatch } from "./store";
import { setPosts } from "@/store/libs/reducers/postReducer";

export const usePost = (posts: IPost[] | null = null) => {
    const dispatch = useAppDispatch();
    const initPosts= (posts: IPost[]) => {
        dispatch(setPosts(posts))
    }
    useEffect(() => {
        if (!posts) {
            return
        }

        initPosts(posts)
    }, [])
    return { initPosts }
}
