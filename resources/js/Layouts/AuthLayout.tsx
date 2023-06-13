import React from 'react';
import { SubmitErrorHandler, SubmitHandler, useForm } from 'react-hook-form';
import { ValidationError } from '../Components/ValidationError'
import { MInput } from '../Components/MInput'
import '../../scss/auth.scss'
import { router } from '@inertiajs/react'
import { zodResolver } from '@hookform/resolvers/zod';
import * as z from 'zod';

export type RegisterFormType = {
    name?: string,
    email: string,
    password: string,
    password_confirmation?: string,
}

export type LoginFormType = Omit<RegisterFormType, 'name'>

export default function AuthLayout({children}: React.PropsWithChildren<{}>) {

    const passwordRegEx= {
        lenght: /^[a-zA-Z0-9!@#$%^&*]{6,16}$/,
        specialCharRequired: /(?=.*[!@#$%^&*])/,
        numberRequired: /(?=.*[0-9])/,
    };
    const schema = z.object({
        name: z.string().min(8, { message: 'Required' }),
        email: z.string().email('must be email'),
        password: z.string().regex(passwordRegEx.lenght, 'must contain 6 char ')
            .regex(passwordRegEx.numberRequired, 'must contain ar least one number')
            .regex(passwordRegEx.specialCharRequired, 'must contain ar least one special char'),
        password_confirmation: z.string()
    }).superRefine(({ password_confirmation, password }, ctx) => {
        if (password_confirmation !== password) {
          ctx.addIssue({
            code: "custom",
            message: "The passwords did not match",
            path: ["password_confirmation"]
          });
        }
      });;

    const { register, handleSubmit, watch, formState: { errors } } = useForm<RegisterFormType>({resolver: zodResolver(schema)});

    const onSubmit:  SubmitHandler<RegisterFormType> = (data) => {
        console.log(data)
        router.post(route('register'), data);
    };

    const onError: SubmitErrorHandler<RegisterFormType> = (error) => {
        console.log(error)
    }
    return (
        <div className="h-screen w-screen flex items-center justify-center">
        <div className="w-2/3 py-28 flex flex-col items-center justify-center bg-gray-400 rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-50 border border-gray-100">
            <div className=" w-2/5 px-28 py-16 bg-white">

                <div className="w-full pb-6">
                    <h1>
                        Plongez dans l'univers des amoureux canins : des conseils, des histoires et des astuces pour choyer votre fidèle compagnon sur notre blog exclusif !
                    </h1>
                    <h3 className="block pt-4 font-3xl">
                        creer un compte <span className="font-bold text-primary">maintenant</span>
                    </h3>
                </div>
                <ValidationError/>
            <form className="w-full flex flex-col items-center justify-center" onSubmit={handleSubmit(onSubmit, onError)}>

                <div className="w-full mt-4">
                    <MInput
                        name='name'
                        type='text'
                        label='entrez votre nom'
                        errors={errors}
                        register={register}
                    />
                </div>

                <div className="w-full mt-4">
                    <MInput
                        name='email'
                        type='email'
                        label='entrez votre email'
                        errors={errors}
                        register={register}
                    />
                </div>

                <div className="w-full mt-4">
                    <MInput
                        name='password'
                        type='password'
                        label='entrez votre mot de passe'
                        errors={errors}
                        register={register}
                    />
                </div>
                <div className="w-full mt-4">
                    <MInput
                        name='password_confirmation'
                        type='password'
                        label='Retapez votre mot de passe'
                        errors={errors}
                        register={register}
                    />
                </div>

                <div className="flex items-center justify-end mt-4">
                    <a className="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        __('Already registered?')
                    </a>

                    <button className="btn ml-4">
                        __('Register')
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>

    )
}
