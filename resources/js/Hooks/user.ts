import { usePage } from '@inertiajs/inertia-react';
import React, { useEffect } from 'react';
import { useAppDispatch } from './store';
import { setUser } from '@/store/libs/reducers/userReducer';
import { IUser } from '@/Interfaces/user';

export const useUser = () => {
    const user = usePage().props.auth?.user satisfies IUser | null;
    console.log(usePage().props);

    const dispatch = useAppDispatch();
    const initUser = () => {
        dispatch(setUser(user))
    }

    const deleteUser = () => dispatch(setUser(null))

    return { initUser, deleteUser }
}
