import Navbar from '@/Components/Navbar'
import { Link, usePage } from '@inertiajs/inertia-react'
import React from 'react'
import logo from '../../img/dalmatien.svg'
import { useAppSelector } from '@/Hooks/store';

function Header() {
    const {auth}  = usePage().props;
    console.log(usePage().props);

    const {user} = useAppSelector((state) => state.user)
    return (
        <header className='h-screen flex flex-col'>
            <Navbar/>
            {user?.email}
            <div className="hero flex-grow">
                <div className="hero-content flex-col lg:flex-row">
                    <img src={logo} className="max-w-sm rounded-lg shadow-2xl" />
                    <div>
                        <p className="py-6">Vous cherchez des conseils pratiques pour prendre soin de votre compagnon à quatre pattes ? Vous êtes au bon endroit ! Nous sommes des experts passionnés par les chiens et nous sommes là pour partager nos connaissances avec vous.</p>
                        <p className="py-6">Ou adoptez en un.</p>
                        <button className="btn btn-primary">Adopter</button>
                    </div>
                </div>
            </div>
            {/* <div >
                <div>
                    <Link href={route('profile.show', {id: auth.user?.id})}></Link>
                </div>
                <div>
                    <span>
                        {auth.user?.name}
                    </span>
                </div>
            </div> */}
        </header>
    )
}

export default Header

