/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('lui_bad_login', {
    id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    ip: {
      type: DataTypes.STRING(100),
      allowNull: false,
      defaultValue: ""
    },
    time: {
      type: DataTypes.INTEGER,
      allowNull: false,
      defaultValue: 0
    }
  }, {
    sequelize,
    tableName: 'lui_bad_login'
  });
};
