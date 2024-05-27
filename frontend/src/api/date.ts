import { parseISO, formatDistance } from "date-fns";

export function relativeTime(dateString: string): string {
    return formatDistance(parseISO(dateString), new Date(), { addSuffix: true });
}
