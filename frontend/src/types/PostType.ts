import { UserType } from "./UserType"

export type PostType = {
    id: string,
    content: string,
    image: string,
    author?: UserType,
    createdAt: string,
    updatedAt: string
}
