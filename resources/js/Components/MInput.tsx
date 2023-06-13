import React, { useEffect, useState } from 'react'
import { InputErrorMessage } from './InputErrorMessage'
import { usePage } from '@inertiajs/inertia-react';
import { FieldErrors, UseFormRegister } from 'react-hook-form';
import { UseFormRegisterReturn } from 'react-hook-form';

type MInputProps = React.AriaAttributes & {
    name: string,
    label?: string,
    type: React.HTMLInputTypeAttribute,
    errors: FieldErrors,
    isFocused?: boolean,
    autoComplete?: string,
    className?: string,
    register?: UseFormRegister<any>
};

export const MInput : React.FC<MInputProps> = (props) => {
    const { className, name, register, errors, label, autoComplete, ...rest } = props;

    return (
        <div className="form-control w-full max-w-xs">
            {label &&
            <label className="label" htmlFor={name}>
                <span className="label-text">{label}</span>
            </label>}
            <input
                name={name}
                className={`w-full ${className && className}`}
                autoComplete={autoComplete}
                {...(register && register(name))}
                {...rest}
            />
            <InputErrorMessage
                error={errors[name]}
            />
        </div>
    )
}
