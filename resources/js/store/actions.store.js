export const startup = async ({ dispatch }) => {
    // fetch team, will eager load projects
    const teams = dispatch("fetchTeams");
    await Promise.all([teams]);
};
