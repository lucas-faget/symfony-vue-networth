import { TagType } from "./TagType"

export type UserType = {
    id: string,
    firstname: string,
    lastname: string,
    email: string,
    title: string,
    profileImage: string,
    tags?: TagType[],
}
