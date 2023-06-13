
export interface IUser {
    id: number,
    name: string,
    /**
    * The email of the hero.
    *
    * @format email
    */
    email: string,
    email_verified_at?: string,
    created_at?:string,
    updated_at?: string,
    phonenumber?: any,
    admin: boolean,
    last_activity?: string,
    isBlocked:boolean
}
