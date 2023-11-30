function getRandomInt(min: number, max: number): number {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

export function getRandomAvatar(): string {
    const randomInt: number = getRandomInt(1, 16);
    return `/avatar/${randomInt}.svg`;
}
