import { User } from "./User"

export type Post = {
    id: string,
    content: string,
    image: string,
    author?: User,
}
