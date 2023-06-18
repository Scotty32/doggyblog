import { PostsList } from "@/Components/PostsList";
import { usePost } from "@/Hooks/post";
import { IPost } from "@/Interfaces/post";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { usePage } from "@inertiajs/inertia-react";
import React from "react";

export default function Home() {
    const posts = usePage().props.posts as IPost[];
    usePost().initPosts(posts)

    return (
        <AuthenticatedLayout>
            <PostsList/>
        </AuthenticatedLayout>
    )
}
