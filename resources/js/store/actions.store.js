export const startup = async ({ dispatch }) => {
    // fetch team, will eager load projects
    const teams = dispatch("fetchTeam");
    await Promise.all([teams]);
};
