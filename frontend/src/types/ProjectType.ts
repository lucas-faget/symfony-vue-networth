import { TagType } from "./TagType"
import { UserType } from "./UserType"

export type ProjectType = {
    id: string,
    title: string,
    description: string,
    tags?: TagType[],
    creator?: UserType,
}
