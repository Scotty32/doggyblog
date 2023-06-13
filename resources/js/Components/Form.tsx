import React from "react";
import { FieldValues, SubmitHandler, useForm } from "react-hook-form";

export type FormPropsType<T extends FieldValues> = React.PropsWithChildren & {
    onSubmit: SubmitHandler<T>,
    onError?: any,

};

export default function Form<T extends FieldValues>({ children, onSubmit,  }: FormPropsType<T>) {
    const methods = useForm<T>();
    const { handleSubmit } = methods;

    return (
        <form onSubmit={handleSubmit(onSubmit)}>
        {React.Children.map(children, (child) => {
            if (child && React.isValidElement(child) && child.props.name) {
                return React.createElement(child.type, {
                  ...{
                    ...child.props,
                    register: methods.register,
                    key: child.props.name,
                  },
                });
              } else {
                return child;
              }
        })}
        </form>
    );
    }
