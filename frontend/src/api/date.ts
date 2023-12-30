import { parseISO, formatDistance } from 'date-fns'

export function timeDistance(dateString: string): string {
    return formatDistance(parseISO(dateString), new Date(), { addSuffix: true });
}
