export const startup = async ({ dispatch }) => {
    const project = dispatch("fetchProjects");
    await Promise.all([project]);
};
