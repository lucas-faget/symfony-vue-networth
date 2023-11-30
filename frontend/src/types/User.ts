import { Tag } from "./Tag"

export type User = {
    id: string,
    firstname: string,
    lastname: string,
    email: string,
    title: string,
    tags: Tag[]
}