import { createSlice, PayloadAction } from '@reduxjs/toolkit';
import { IUser } from '@/Interfaces/user';

interface initialStateProps {
    user: IUser | null
}
const initialState: initialStateProps = {
    user: null
}

const userSlice = createSlice({
    name: 'user',
    initialState,
    reducers: {
        setUser: (state, action: PayloadAction<IUser | null>) => {
            console.log(state.user)
            state.user = action.payload
        },
    }
})

export const { setUser } = userSlice.actions
export const user = userSlice.reducer
