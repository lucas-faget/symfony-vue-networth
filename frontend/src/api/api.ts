import axios from 'axios';

export const fetchUsers = async () => {
    try {
        const response = await axios.get(`https://localhost:8000/api/users`);
        return response.data;
    } catch (error) {
        console.error(error);
        throw error;
    }
};

export const fetchUser = async (id: string) => {
    try {
        const response = await axios.get(`https://localhost:8000/api/users/${id}`);
        return response.data;
    } catch (error) {
        console.error(error);
        throw error;
    }
};
