export const startup = async ({ dispatch }) => {
    const team = dispatch("fetchTeam");
    const user = dispatch("fetchUser");
    await Promise.all([team, user]);
};
