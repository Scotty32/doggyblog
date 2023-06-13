import React from 'react';
import { FieldError, FieldErrorsImpl, Merge } from 'react-hook-form';


type ErrorMessageProps = {
    error? : FieldError | Merge<FieldError, FieldErrorsImpl<any>>,
    className?: string
};

export const InputErrorMessage: React.FC<ErrorMessageProps> = ({ error, className}) => (
    error ? <p className={'text-sm text-red-600 ' + className}>{error.message?.toString()}</p> : null
);
