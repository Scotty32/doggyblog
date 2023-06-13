import { createSlice, PayloadAction } from '@reduxjs/toolkit';
import { IUser } from '@/Interfaces/user';
import { IPost } from '@/Interfaces/post';
import { getPostById } from '@/services/post';

interface InitialStateProps {
    posts?: IPost[],
    post?: IPost,
}
const initialState: InitialStateProps = {

}

const postsSlice = createSlice({
    name: 'posts',
    initialState,
    reducers: {
        setPost: (state, action: PayloadAction<IPost>) => {
            state.post = action.payload
        },
        setPosts: (state, action: PayloadAction<IPost[]>) => {
            state.posts = action.payload
        },
        likePost: (state, action: PayloadAction<IPost>) => {
            const post = getPostById(action.payload.id)
            if (!post) {
                return
            }

            post.like_count ++
        },
        dislikePost: (state, action: PayloadAction<IPost>) => {
            const post = getPostById(action.payload.id)
            if (!post) {
                return
            }
            post.like_count ++
        }

    }
})

export const { setPost, setPosts } = postsSlice.actions
export const posts = postsSlice.reducer
