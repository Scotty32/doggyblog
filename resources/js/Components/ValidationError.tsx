import { usePage } from '@inertiajs/inertia-react';
import React from 'react';

export type ValidationErrorProps = {
    className?: string,
}
export const ValidationError = ({className}: ValidationErrorProps) => {
    const {errors} = usePage().props

    return (
        <div className= { className }>
            {errors &&
            <>
                <div className="font-medium text-red-600">
                __('Whoops! Something went wrong.')
                </div>

                <ul className="mt-3 list-disc list-inside text-sm text-red-600">
                        {Object.keys(errors).map((key) => (
                            <li key={key}>{errors[key]}</li>
                        ))}
                </ul>
            </>}
        </div>
    )
}
