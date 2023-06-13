import Header from '@/Components/Header'
import { Head, usePage } from '@inertiajs/inertia-react'
import bg from '../../img/view-1844110_1920.jpg'
import React from  'react'
import { useUser } from '@/Hooks/user'
import { useAppSelector } from '@/Hooks/store'

export default function AuthenticatedLayout({children}: any) {

    return (
        <div className='max-w-screen min-h-screen'>
            <Header/>
            <main>
                {children}
            </main>
        </div>
    )
}
