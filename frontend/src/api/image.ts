export function getAvatar(image: string): string {
    return `/avatar/${image}`;
}

export function getRandomImageUrl(): string {
    const random: number = Math.floor(Math.random() * (50 - 1 + 1)) + 1;
    return `https://picsum.photos/480/360?random=${random}`;
}
