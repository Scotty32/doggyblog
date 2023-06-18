import { useAppSelector } from "@/Hooks/store"

export const getPostById = (id: number) => {
    const { posts } = useAppSelector(state => state.posts)

    return posts?.find(post => post.id === id)
}
